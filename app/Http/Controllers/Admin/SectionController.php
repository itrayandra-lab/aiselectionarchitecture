<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Log;

class SectionController extends Controller
{
    /**
     * Update section content via inline editing
     */
    public function updateInline(Request $request)
    {
        try {
            $request->validate([
                'section_id' => 'required|exists:sections,id',
                'content' => 'required|array',
            ]);

            $section = Section::findOrFail($request->section_id);
            
            // Update entire content JSON
            $section->content = $request->content;
            $section->save();

            return response()->json([
                'success' => true,
                'message' => 'Section updated successfully',
                'data' => $section
            ]);

        } catch (\Exception $e) {
            Log::error('Section update error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to update section: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Upload image for section
     */
    public function uploadImage(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'section_id' => 'required|exists:sections,id',
            ]);

            $section = Section::findOrFail($request->section_id);
            
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'section_' . $section->id . '_' . time() . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('sections', $filename, 'public');
                
                // Update section content with new image path
                $content = $section->content;
                $content['image'] = $path;
                $section->content = $content;
                $section->save();
                
                return response()->json([
                    'success' => true,
                    'message' => 'Image uploaded successfully',
                    'path' => $path
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No image file provided'
            ], 400);

        } catch (\Exception $e) {
            Log::error('Image upload error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to upload image: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get section by unique identifier
     */
    public function getByUnique($uniqueSection)
    {
        try {
            $section = Section::where('unique_section', $uniqueSection)->first();
            
            if (!$section) {
                return response()->json([
                    'success' => false,
                    'message' => 'Section not found'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $section
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
