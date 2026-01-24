// AI Chat Module
export class DraggableAIChat {
    constructor() {
        this.apiEndpoint = 'https://text.pollinations.ai/';
        this.isProcessing = false;
        this.selectedText = '';
        this.replyText = '';
        this.isOpen = false;
        this.isDragging = false;
        this.isResizing = false;
        this.dragOffset = { x: 0, y: 0 };
        this.chatHistory = [];
        this.loadingInterval = null;
        this.timerInterval = null;
        this.typingInterval = null;
        this.startTime = null;
        this.maxHistoryLength = 10;
    }

    init() {
        // Only initialize if URL starts with /portal
        if (!this.shouldShowChat()) {
            return;
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => this.initializeChat());
        } else {
            this.initializeChat();
        }
    }

    shouldShowChat() {
        const currentPath = window.location.pathname;
        return currentPath.startsWith('/portal');
    }

    initializeChat() {
        if (typeof $ === 'undefined') {
            console.error('jQuery is required for AI Chat');
            return;
        }
        
        // Remove any existing AI chat elements to prevent duplicates
        $('#aiFloatingBtn').remove();
        $('#aiChatWidget').remove();
        $('.copy-button').remove();
        
        this.createFloatingButton();
        this.createChatWidget();
        this.bindEvents();
    }

    createFloatingButton() {
        const floatingBtn = $(`
            <div id="aiFloatingBtn" style="
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
                background: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 4px 20px rgba(0,0,0,0.15);
                z-index: 9999;
                transition: all 0.3s ease;
                border: 2px solid #f0f0f0;
            ">
                <img src="/assets/img/ai-icon.png" alt="AI" style="width: 35px; height: 35px; border-radius: 50%;">
            </div>
        `);
        
        $('body').append(floatingBtn);
        
        floatingBtn.on('click', () => this.toggleChat());
        floatingBtn.on('mouseenter', function() {
            $(this).css('transform', 'scale(1.1)');
        }).on('mouseleave', function() {
            $(this).css('transform', 'scale(1)');
        });
    }

    createChatWidget() {
        const chatWidget = $(`
            <div id="aiChatWidget" style="
                position: fixed;
                bottom: 90px;
                right: 20px;
                width: 350px;
                height: 500px;
                min-width: 300px;
                min-height: 400px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 32px rgba(0,0,0,0.12);
                z-index: 9998;
                display: none;
                flex-direction: column;
                overflow: hidden;
                border: 1px solid #e1e5e9;
                resize: both;
            ">
                <div id="chatHeader" style="
                    background: white;
                    color: #333;
                    padding: 16px 20px;
                    cursor: move;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    user-select: none;
                    border-bottom: 1px solid #e1e5e9;
                ">
                    <div style="display: flex; align-items: center;">
                        <img src="/assets/img/ai-icon.png" alt="AI" style="width: 20px; height: 20px; border-radius: 50%; margin-right: 8px;">
                        <span style="font-weight: 600; font-size: 16px;">Raymaizing</span>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button id="minimizeBtn" style="
                            background: #f5f5f5;
                            border: none;
                            color: #666;
                            width: 24px;
                            height: 24px;
                            border-radius: 4px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">−</button>
                        <button id="closeBtn" style="
                            background: #f5f5f5;
                            border: none;
                            color: #666;
                            width: 24px;
                            height: 24px;
                            border-radius: 4px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">×</button>
                    </div>
                </div>
                
                <div id="replyInfo" style="
                    display: none;
                    background: #f8fafc;
                    border-bottom: 1px solid #e2e8f0;
                    padding: 12px 16px;
                    position: relative;
                ">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 1;">
                            <div style="
                                font-size: 11px;
                                color: #64748b;
                                font-weight: 500;
                                margin-bottom: 6px;
                                display: flex;
                                align-items: center;
                                gap: 4px;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#1E90FF" stroke-width="2">
                                    <path d="M3 10h10a8 8 0 0 1 8 8v2M3 10l6 6M3 10l6-6"/>
                                </svg>
                                Membalas Raymaizing
                            </div>
                            <div id="replyContent" style="
                                font-size: 13px;
                                color: #334155;
                                line-height: 1.4;
                                background: white;
                                padding: 8px 12px;
                                border-radius: 8px;
                                border: 1px solid #e2e8f0;
                                max-height: 60px;
                                overflow-y: auto;
                            "></div>
                        </div>
                        <button id="closeReply" style="
                            background: #f1f5f9;
                            border: 1px solid #e2e8f0;
                            color: #64748b;
                            cursor: pointer;
                            padding: 4px 6px;
                            margin-left: 12px;
                            border-radius: 6px;
                            font-size: 12px;
                            transition: all 0.2s;
                            width: 24px;
                            height: 24px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        " onmouseover="this.style.background='#e2e8f0'; this.style.color='#475569'" onmouseout="this.style.background='#f1f5f9'; this.style.color='#64748b'">×</button>
                    </div>
                </div>

                <div id="chatMessages" style="
                    flex: 1;
                    padding: 16px;
                    overflow-y: auto;
                    background: #fafbfc;
                ">
                    <div class="ai-message" style="margin-bottom: 16px;">
                        <div style="
                            background: white;
                            padding: 12px 16px;
                            border-radius: 12px;
                            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                            font-size: 14px;
                            line-height: 1.4;
                        ">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <img src="/assets/img/ai-icon.png" alt="AI" style="width: 16px; height: 16px; border-radius: 50%; margin-right: 6px;">
                                <span style="font-weight: 600; color: #1E90FF;">Raymaizing</span>
                            </div>
                            Halo! Saya Raymaizing, asisten virtual yang siap membantu Anda. Silakan ajukan pertanyaan atau pilih teks untuk mendapatkan bantuan.
                            <div style="margin-top: 8px;">
                                <small style="
                                    color: #64748b;
                                    font-size: 11px;
                                    display: flex;
                                    align-items: center;
                                    gap: 4px;
                                ">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#1E90FF" stroke-width="2">
                                        <path d="M9 12l2 2 4-4"/>
                                        <circle cx="12" cy="12" r="10"/>
                                    </svg>
                                    Saya akan mengingat percakapan kita untuk konteks yang lebih baik
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="chatInput" style="
                    padding: 16px;
                    border-top: 1px solid #e1e5e9;
                    background: white;
                ">
                    <div style="position: relative;">
                        <textarea id="messageInput" placeholder="Tulis pertanyaan Anda..." style="
                            width: 100%;
                            border: 1px solid #d1d5db;
                            border-radius: 12px;
                            padding: 10px 50px 10px 16px;
                            font-size: 14px;
                            outline: none;
                            transition: border-color 0.2s;
                            resize: none;
                            min-height: 40px;
                            max-height: 120px;
                            font-family: inherit;
                        "></textarea>
                        <button id="sendBtn" style="
                            position: absolute;
                            right: 8px;
                            top: 50%;
                            transform: translateY(-50%);
                            background: #1E90FF;
                            border: none;
                            color: white;
                            width: 32px;
                            height: 32px;
                            border-radius: 50%;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: background 0.2s;
                        ">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 3 3 9-3 9 19-9Z"/>
                                <path d="m6 12 13 0"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `);
        
        $('body').append(chatWidget);
    }

    bindEvents() {
        let selectionTimeout;
        
        $(document).on('mouseup', (e) => {
            clearTimeout(selectionTimeout);
            selectionTimeout = setTimeout(() => {
                const selected = this.getSelectedText();
                const target = $(e.target);
                
                if (selected.trim().length > 0) {
                    if (target.closest('#aiChatWidget').length > 0) {
                        this.showCopyButton(e, selected);
                    } else {
                        this.selectedText = selected;
                        if (this.isOpen) {
                            this.showReply(selected);
                        }
                    }
                }
            }, 100);
        });

        $(document).on('click', (e) => {
            if (!$(e.target).closest('.copy-button').length) {
                $('.copy-button').remove();
            }
        });

        $(document).on('click', '.reply-btn', (e) => {
            const message = $(e.target).closest('.reply-btn').data('message');
            this.showReply(message);
            $('#messageInput').focus();
        });

        $(document).on('click', '.copy-message-btn', (e) => {
            const message = $(e.target).closest('.copy-message-btn').data('message');
            this.copyMessageWithFormat(message, e.target);
        });

        $(document).on('click', '.copy-plain-btn', (e) => {
            const message = $(e.target).closest('.copy-plain-btn').data('message');
            this.copyPlainText(message, e.target);
        });

        $(document).on('click', '.copy-editor-btn', (e) => {
            const message = $(e.target).closest('.copy-editor-btn').data('message');
            this.copyMessageWithFormat(message, e.target);
        });

        $('#sendBtn').on('click', () => this.sendMessage());
        $('#messageInput').on('keydown', (e) => {
            if (e.ctrlKey && e.keyCode === 32) {
                e.preventDefault();
                const textarea = e.target;
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;
                const value = textarea.value;
                textarea.value = value.substring(0, start) + '\n' + value.substring(end);
                textarea.selectionStart = textarea.selectionEnd = start + 1;
                this.autoResize(textarea);
            } else if (e.keyCode === 13 && !e.shiftKey && !e.ctrlKey) {
                e.preventDefault();
                this.sendMessage();
            }
        });

        $('#messageInput').on('input', (e) => {
            this.autoResize(e.target);
        });

        $('#closeBtn').on('click', () => this.closeChat());
        $('#minimizeBtn').on('click', () => this.minimizeChat());
        $('#closeReply').on('click', () => this.closeReply());

        this.makeDraggable();

        $('#messageInput').on('focus', function() {
            $(this).css('border-color', '#1E90FF');
        }).on('blur', function() {
            $(this).css('border-color', '#d1d5db');
        });

        $('#sendBtn').on('mouseenter', function() {
            $(this).css('background', '#4169E1');
        }).on('mouseleave', function() {
            $(this).css('background', '#1E90FF');
        });
    }

    autoResize(textarea) {
        textarea.style.height = 'auto';
        textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
    }

    showCopyButton(e, text) {
        $('.copy-button').remove();
        
        const copyMenu = $(`
            <div class="copy-button" style="
                position: absolute;
                top: ${e.pageY + 10}px;
                left: ${e.pageX}px;
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 99999;
                overflow: hidden;
                min-width: 140px;
            ">
                <div class="copy-plain-option" style="
                    padding: 8px 12px;
                    cursor: pointer;
                    font-size: 12px;
                    color: #374151;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    transition: background 0.2s;
                " onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='white'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                        <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                    </svg> Copy Text
                </div>
                <div class="copy-editor-option" style="
                    padding: 8px 12px;
                    cursor: pointer;
                    font-size: 12px;
                    color: #374151;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    border-top: 1px solid #e5e7eb;
                    transition: background 0.2s;
                " onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='white'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                        <path d="m15 5 4 4"/>
                    </svg> Copy for Editor
                </div>
            </div>
        `);
        
        $('body').append(copyMenu);
        
        // Copy plain text
        copyMenu.find('.copy-plain-option').on('click', () => {
            const plainText = this.cleanTextForReply(text);
            navigator.clipboard.writeText(plainText).then(() => {
                copyMenu.html('<div style="padding: 8px 12px; color: #10b981; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Copied!</div>');
                setTimeout(() => {
                    copyMenu.remove();
                }, 1000);
            }).catch(() => {
                copyMenu.html('<div style="padding: 8px 12px; color: #ef4444; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg> Error!</div>');
                setTimeout(() => {
                    copyMenu.remove();
                }, 1000);
            });
        });
        
        // Copy for editor
        copyMenu.find('.copy-editor-option').on('click', () => {
            const summernoteHTML = this.formatSelectedTextForSummernote(text);
            this.copyToClipboardWithHTML(summernoteHTML, text).then(() => {
                copyMenu.html('<div style="padding: 8px 12px; color: #10b981; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Copied for Editor!</div>');
                setTimeout(() => {
                    copyMenu.remove();
                }, 1000);
            }).catch(() => {
                copyMenu.html('<div style="padding: 8px 12px; color: #ef4444; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg> Error!</div>');
                setTimeout(() => {
                    copyMenu.remove();
                }, 1000);
            });
        });
        
        setTimeout(() => {
            copyMenu.remove();
        }, 5000);
    }

    formatSelectedTextForSummernote(selectedText) {
        // Check if selected text contains HTML (from AI message)
        if (selectedText.includes('<') && selectedText.includes('>')) {
            // It's HTML content, format it properly
            return this.formatForSummernote(selectedText);
        } else {
            // It's plain text, wrap in paragraph and preserve line breaks
            let formattedText = selectedText
                .replace(/\n/g, '<br>')
                .trim();
            
            if (formattedText.length > 0) {
                // Wrap in paragraph if it doesn't contain block elements
                if (!formattedText.includes('<br>') || formattedText.split('<br>').length <= 2) {
                    formattedText = '<p>' + formattedText + '</p>';
                } else {
                    // Multiple lines, convert to proper paragraphs
                    const lines = formattedText.split('<br>').filter(line => line.trim().length > 0);
                    formattedText = lines.map(line => '<p>' + line.trim() + '</p>').join('');
                }
            }
            
            return formattedText;
        }
    }

    makeDraggable() {
        const widget = $('#aiChatWidget');
        const header = $('#chatHeader');

        header.on('mousedown', (e) => {
            this.isDragging = true;
            const rect = widget[0].getBoundingClientRect();
            this.dragOffset.x = e.clientX - rect.left;
            this.dragOffset.y = e.clientY - rect.top;
            
            widget.css('transition', 'none');
            $('body').css('user-select', 'none');
        });

        $(document).on('mousemove', (e) => {
            if (!this.isDragging) return;

            const x = e.clientX - this.dragOffset.x;
            const y = e.clientY - this.dragOffset.y;

            const maxX = window.innerWidth - widget.outerWidth();
            const maxY = window.innerHeight - widget.outerHeight();

            const constrainedX = Math.max(0, Math.min(x, maxX));
            const constrainedY = Math.max(0, Math.min(y, maxY));

            widget.css({
                left: constrainedX + 'px',
                top: constrainedY + 'px',
                right: 'auto',
                bottom: 'auto'
            });
        });

        $(document).on('mouseup', () => {
            if (this.isDragging) {
                this.isDragging = false;
                widget.css('transition', 'all 0.3s ease');
                $('body').css('user-select', 'auto');
            }
        });
    }

    getSelectedText() {
        if (window.getSelection) {
            return window.getSelection().toString();
        } else if (document.selection) {
            return document.selection.createRange().text;
        }
        return '';
    }

    toggleChat() {
        if (this.isOpen) {
            this.closeChat();
        } else {
            this.openChat();
        }
    }

    openChat() {
        $('#aiChatWidget').css('display', 'flex').hide().fadeIn(300);
        this.isOpen = true;
        
        if (this.selectedText) {
            this.showReply(this.selectedText);
        }
        
        setTimeout(() => {
            $('#messageInput').focus();
        }, 350);
    }

    closeChat() {
        $('#aiChatWidget').fadeOut(300);
        this.isOpen = false;
        this.closeReply();
        
        // Clear all intervals
        if (this.typingInterval) {
            clearInterval(this.typingInterval);
            this.typingInterval = null;
        }
        if (this.timerInterval) {
            clearInterval(this.timerInterval);
            this.timerInterval = null;
        }
        if (this.loadingInterval) {
            clearInterval(this.loadingInterval);
            this.loadingInterval = null;
        }
    }

    minimizeChat() {
        $('#aiChatWidget').fadeOut(300);
        this.isOpen = false;
    }

    showReply(text) {
        // Clean text from HTML and markdown for reply display
        const cleanedText = this.cleanTextForReply(text);
        
        this.replyText = text; // Keep original for context
        document.getElementById('replyContent').textContent = cleanedText;
        document.getElementById('replyInfo').style.display = 'block';
        
        // Smooth slide down animation
        const replyInfo = document.getElementById('replyInfo');
        replyInfo.style.maxHeight = '0px';
        replyInfo.style.overflow = 'hidden';
        replyInfo.style.transition = 'max-height 0.3s ease-out';
        
        setTimeout(() => {
            replyInfo.style.maxHeight = '200px';
        }, 10);
    }

    clearChatHistory() {
        this.chatHistory = [];
        console.log('Chat history cleared');
    }

    getChatHistoryInfo() {
        return {
            totalChats: this.chatHistory.length,
            maxHistory: this.maxHistoryLength,
            oldestChat: this.chatHistory.length > 0 ? new Date(this.chatHistory[0].timestamp).toLocaleString('id-ID') : null,
            newestChat: this.chatHistory.length > 0 ? new Date(this.chatHistory[this.chatHistory.length - 1].timestamp).toLocaleString('id-ID') : null
        };
    }

    copyPlainText(message, buttonElement) {
        // Convert to clean plain text
        const plainText = this.cleanTextForReply(message);
        
        // Copy plain text to clipboard
        navigator.clipboard.writeText(plainText).then(() => {
            // Show success feedback
            const originalText = buttonElement.innerHTML;
            buttonElement.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Copied!';
            buttonElement.style.background = '#d4edda';
            buttonElement.style.borderColor = '#c3e6cb';
            buttonElement.style.color = '#155724';
            
            // Reset button after 2 seconds
            setTimeout(() => {
                buttonElement.innerHTML = originalText;
                buttonElement.style.background = '#f8f9fa';
                buttonElement.style.borderColor = '#e9ecef';
                buttonElement.style.color = '#6c757d';
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy text: ', err);
            // Show error feedback
            const originalText = buttonElement.innerHTML;
            buttonElement.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg>Error';
            buttonElement.style.background = '#f8d7da';
            buttonElement.style.borderColor = '#f5c6cb';
            buttonElement.style.color = '#721c24';
            
            setTimeout(() => {
                buttonElement.innerHTML = originalText;
                buttonElement.style.background = '#f8f9fa';
                buttonElement.style.borderColor = '#e9ecef';
                buttonElement.style.color = '#6c757d';
            }, 2000);
        });
    }

    copyMessageWithFormat(message, buttonElement) {
        const summernoteHTML = this.formatForSummernote(message);
        
        this.copyToClipboardWithHTML(summernoteHTML, message).then(() => {
            const originalText = buttonElement.innerHTML;
            buttonElement.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Copied!';
            buttonElement.style.background = '#d4edda';
            buttonElement.style.borderColor = '#c3e6cb';
            buttonElement.style.color = '#155724';
            
            setTimeout(() => {
                buttonElement.innerHTML = originalText;
                buttonElement.style.background = '#f8f9fa';
                buttonElement.style.borderColor = '#e9ecef';
                buttonElement.style.color = '#6c757d';
            }, 2000);
        }).catch(err => {
            console.error('Failed to copy text: ', err);
            const originalText = buttonElement.innerHTML;
            buttonElement.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg>Error';
            buttonElement.style.background = '#f8d7da';
            buttonElement.style.borderColor = '#f5c6cb';
            buttonElement.style.color = '#721c24';
            
            setTimeout(() => {
                buttonElement.innerHTML = originalText;
                buttonElement.style.background = '#f8f9fa';
                buttonElement.style.borderColor = '#e9ecef';
                buttonElement.style.color = '#6c757d';
            }, 2000);
        });
    }

    formatForSummernote(text) {
        let summernoteHTML = this.formatResponse(text);
        
        summernoteHTML = summernoteHTML
            .replace(/<br\s*\/?>/g, '<br>')                    // Normalize <br> tags
            .replace(/\n/g, '<br>')                            // Convert newlines to <br>
            .replace(/<\/p><br>/g, '</p>')                     // Remove <br> after </p>
            .replace(/<br><p>/g, '<p>')                        // Remove <br> before <p>
            .replace(/(<p[^>]*>)\s*(<br>)+/g, '$1')           // Remove <br> at start of <p>
            .replace(/(<br>)+\s*(<\/p>)/g, '$2')              // Remove <br> at end of <p>
            .replace(/(<br>){2,}/g, '</p><p>')                // Convert double <br> to paragraphs
            .replace(/^(<br>)+|(<br>)+$/g, '')                // Remove leading/trailing <br>
            .trim();
        
        if (!summernoteHTML.startsWith('<p') && !summernoteHTML.includes('<h') && summernoteHTML.length > 0) {
            summernoteHTML = '<p>' + summernoteHTML + '</p>';
        }
        
        return summernoteHTML;
    }

    async copyToClipboardWithHTML(htmlContent, plainText) {
        try {
            if (navigator.clipboard && window.ClipboardItem) {
                const clipboardItem = new ClipboardItem({
                    'text/html': new Blob([htmlContent], { type: 'text/html' }),
                    'text/plain': new Blob([this.cleanTextForReply(plainText)], { type: 'text/plain' })
                });
                await navigator.clipboard.write([clipboardItem]);
            } else {
                await this.fallbackCopyHTML(htmlContent, plainText);
            }
        } catch (err) {
            await navigator.clipboard.writeText(this.cleanTextForReply(plainText));
        }
    }

    async fallbackCopyHTML(htmlContent, plainText) {
        return new Promise((resolve, reject) => {
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = htmlContent;
            tempDiv.style.position = 'absolute';
            tempDiv.style.left = '-9999px';
            tempDiv.contentEditable = true;
            
            document.body.appendChild(tempDiv);
            
            const range = document.createRange();
            range.selectNodeContents(tempDiv);
            const selection = window.getSelection();
            selection.removeAllRanges();
            selection.addRange(range);
            
            try {
                const successful = document.execCommand('copy');
                if (successful) {
                    resolve();
                } else {
                    reject(new Error('Copy command failed'));
                }
            } catch (err) {
                reject(err);
            } finally {
                selection.removeAllRanges();
                document.body.removeChild(tempDiv);
            }
        });
    }

    cleanTextForReply(text) {
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = text;
        const plainText = tempDiv.textContent || tempDiv.innerText || '';
        
        return plainText
            .replace(/\*\*(.*?)\*\*/g, '$1') // Remove **bold**
            .replace(/\*(.*?)\*/g, '$1')     // Remove *italic*
            .replace(/`(.*?)`/g, '$1')       // Remove `code`
            .replace(/#{1,6}\s/g, '')        // Remove # headers
            .replace(/\[([^\]]+)\]\([^)]+\)/g, '$1') // Remove [links](url)
            .replace(/~~(.*?)~~/g, '$1')     // Remove ~~strikethrough~~
            .replace(/__(.*?)__/g, '$1')     // Remove __underline__
            .trim();
    }

    closeReply() {
        this.replyText = '';
        this.selectedText = '';
        
        const replyInfo = document.getElementById('replyInfo');
        if (replyInfo) {
            replyInfo.style.transition = 'max-height 0.3s ease-out';
            replyInfo.style.maxHeight = '0px';
            
            setTimeout(() => {
                replyInfo.style.display = 'none';
                replyInfo.style.maxHeight = '';
            }, 300);
        }
    }

    async sendMessage() {
        const input = $('#messageInput');
        const message = input.val().trim();
        
        if (!message || this.isProcessing) return;

        let fullMessage = message;
        let displayMessage = message;
        let replyToText = this.replyText;
        
        if (this.replyText) {
            fullMessage = this.buildContextualPrompt(message, this.replyText);
            this.closeReply();
        } else {
            fullMessage = this.buildContextualPrompt(message);
        }

        this.isProcessing = true;
        this.addMessage('user', displayMessage, replyToText);
        input.val('');
        this.autoResize(input[0]);
        this.showTyping();

        try {
            const response = await this.callAI(fullMessage);
            this.hideTyping();
            this.addMessage('ai', response);
            
            const chatEntry = {
                user: this.cleanTextForReply(displayMessage),
                ai: this.cleanTextForReply(response),
                timestamp: Date.now(),
                originalUser: displayMessage,
                originalAI: response
            };
            
            this.chatHistory.push(chatEntry);
            
            if (this.chatHistory.length > this.maxHistoryLength) {
                this.chatHistory = this.chatHistory.slice(-this.maxHistoryLength);
            }
            
        } catch (error) {
            this.hideTyping();
            this.addMessage('error', 'Maaf, terjadi kesalahan: ' + error.message);
        }

        this.isProcessing = false;
    }

    getRecentHistory() {
        if (this.chatHistory.length === 0) return "percakapan baru";
        
        const contextLength = Math.min(5, this.chatHistory.length);
        const recentChats = this.chatHistory.slice(-contextLength);
        
        return recentChats.map((chat, index) => {
            const cleanUser = this.cleanTextForReply(chat.user);
            const cleanAI = this.cleanTextForReply(chat.ai);
            return `[${index + 1}] User: "${cleanUser}" | AI: "${cleanAI}"`;
        }).join(' ');
    }

    buildContextualPrompt(currentMessage, replyContext = null) {
        let contextPrompt = '';
        
        if (this.chatHistory.length > 0) {
            const historyContext = this.getRecentHistory();
            contextPrompt += `KONTEKS PERCAKAPAN SEBELUMNYA:\n${historyContext}\n\n`;
        }
        
        if (replyContext) {
            const cleanReplyContext = this.cleanTextForReply(replyContext);
            contextPrompt += `MEMBALAS PESAN: "${cleanReplyContext}"\n\n`;
        }
        
        contextPrompt += `PERTANYAAN SAAT INI: ${currentMessage}`;
        
        return contextPrompt;
    }

    async callAI(prompt) {
        const systemPrompt = `Anda adalah Raymaizing, asisten author yang membantu menjawab pertanyaan dalam Bahasa Indonesia. 

ATURAN IDENTITAS:
- Jika ditanya siapa Anda, jawab: "Saya Raymaizing, asisten author yang siap membantu Anda"
- Jangan pernah menyebut diri sebagai AI Assistant atau nama lain

ATURAN KONTEKS PERCAKAPAN:
- Anda memiliki akses ke riwayat percakapan sebelumnya
- Gunakan konteks percakapan untuk memberikan jawaban yang relevan dan berkesinambungan
- Jika ada referensi ke pesan sebelumnya, pahami konteksnya
- Jangan ulangi informasi yang sudah diberikan kecuali diminta

ATURAN FORMAT JAWABAN:
- Hindari membuat tabel dalam jawaban
- Untuk teks tebal gunakan **teks tebal**
- Untuk teks miring gunakan *teks miring*
- Untuk daftar gunakan - atau 1. 2. 3.
- Gunakan paragraf yang jelas dan mudah dibaca
- Jawaban maksimal 300 kata kecuali diminta lebih detail

GAYA KOMUNIKASI:
- Ramah dan profesional
- Gunakan Bahasa Indonesia yang baik dan benar
- Berikan jawaban yang informatif dan membantu
- Tunjukkan pemahaman terhadap konteks percakapan
- Jika merujuk ke percakapan sebelumnya, lakukan dengan natural`;

        const url = `${this.apiEndpoint}${encodeURIComponent(prompt)}?model=openai&temperature=0.7&system=${encodeURIComponent(systemPrompt)}`;
        
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
        }
        
        let responseText = await response.text();
        
        // Filter out Pollinations.AI promotional messages
        responseText = this.cleanPollinationsAds(responseText);
        
        return responseText;
    }

    cleanPollinationsAds(text) {
        // Remove various Pollinations.AI promotional messages
        let cleanedText = text
            // Remove the specific ad message with exact pattern
            .replace(/---Support Pollinations\.AI:---🌸 Ad 🌸Powered by Pollinations\.AI free text APIs\. Support our mission to keep AI accessible for everyone\./gi, '')
            // Remove variations with different spacing
            .replace(/---\s*Support\s+Pollinations\.AI\s*:?\s*---\s*🌸\s*Ad\s*🌸.*?Pollinations\.AI.*?everyone\.?/gi, '')
            // Remove just the support message part
            .replace(/---\s*Support\s+Pollinations\.AI\s*:?\s*---/gi, '')
            // Remove flower ad emoji pattern
            .replace(/🌸\s*Ad\s*🌸.*?Pollinations\.AI.*?everyone\.?/gi, '')
            .replace(/🌸\s*Ad\s*🌸/gi, '')
            // Remove powered by messages
            .replace(/Powered\s+by\s+Pollinations\.AI.*?everyone\.?/gi, '')
            .replace(/Powered\s+by\s+Pollinations\.AI.*?APIs\.?/gi, '')
            // Remove support mission messages
            .replace(/Support\s+our\s+mission\s+to\s+keep\s+AI\s+accessible\s+for\s+everyone\.?/gi, '')
            // Remove any remaining Pollinations.AI promotional text
            .replace(/Pollinations\.AI\s+free\s+text\s+APIs\.?/gi, '')
            // Remove standalone promotional elements
            .replace(/🌸/g, '')
            .replace(/---+/g, '')
            // Clean up extra whitespace and newlines
            .replace(/\n{3,}/g, '\n\n')
            .replace(/\s{3,}/g, ' ')
            .replace(/^\s+|\s+$/g, '')
            .trim();
        
        return cleanedText;
    }

    addMessage(type, message, replyTo = null) {
        const container = $('#chatMessages');
        const time = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });

        let messageHTML = '';
        
        if (type === 'user') {
            let replyHTML = '';
            if (replyTo) {
                const truncatedReply = this.truncateText(replyTo, 60);
                replyHTML = `
                    <div style="
                        background: rgba(255, 255, 255, 0.5);
                        border-left: 3px solid rgba(14, 165, 233, 0.4);
                        padding: 8px 10px;
                        margin-bottom: 8px;
                        border-radius: 6px;
                        backdrop-filter: blur(20px);
                        -webkit-backdrop-filter: blur(20px);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                    ">
                        <div style="
                            font-size: 10px;
                            color: rgba(15, 23, 42, 0.7);
                            font-weight: 500;
                            margin-bottom: 3px;
                        ">Raymaizing</div>
                        <div style="
                            font-size: 12px;
                            color: rgba(15, 23, 42, 0.8);
                            line-height: 1.3;
                        ">${truncatedReply}</div>
                    </div>
                `;
            }
            
            messageHTML = `
                <div class="user-message" style="margin-bottom: 16px; text-align: right;">
                    <div style="
                        background: #e0f2fe;
                        color: #0f172a;
                        padding: 12px 16px;
                        border-radius: 12px;
                        display: inline-block;
                        max-width: 80%;
                        font-size: 14px;
                        line-height: 1.4;
                        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                    ">
                        ${replyHTML}
                        ${this.escapeHtml(message)}
                    </div>
                    <div style="font-size: 11px; color: #9ca3af; margin-top: 4px;">
                        ${time}
                    </div>
                </div>
            `;
        } else if (type === 'ai') {
            messageHTML = `
                <div class="ai-message" style="margin-bottom: 16px;">
                    <div style="
                        background: white;
                        padding: 12px 16px;
                        border-radius: 12px;
                        display: inline-block;
                        max-width: 80%;
                        font-size: 14px;
                        line-height: 1.4;
                        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                    ">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <img src="/assets/img/ai-icon.png" alt="AI" style="width: 16px; height: 16px; border-radius: 50%; margin-right: 6px;">
                            <span style="font-weight: 600; color: #1E90FF; font-size: 12px;">Raymaizing</span>
                        </div>
                        ${this.formatResponse(message)}
                        <div style="margin-top: 12px; display: flex; gap: 6px; flex-wrap: wrap;">
                            <button class="reply-btn" data-message="${this.escapeHtml(message)}" style="
                                background: #f8f9fa;
                                border: 1px solid #e9ecef;
                                color: #6c757d;
                                padding: 4px 8px;
                                border-radius: 12px;
                                font-size: 11px;
                                cursor: pointer;
                                transition: all 0.2s;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;">
                                    <path d="M3 10h10a8 8 0 0 1 8 8v2M3 10l6 6M3 10l6-6"/>
                                </svg>Balas
                            </button>
                            <button class="copy-plain-btn" data-message="${this.escapeHtml(message)}" style="
                                background: #f8f9fa;
                                border: 1px solid #e9ecef;
                                color: #6c757d;
                                padding: 4px 8px;
                                border-radius: 12px;
                                font-size: 11px;
                                cursor: pointer;
                                transition: all 0.2s;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;">
                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                                </svg>Copy
                            </button>
                            <button class="copy-editor-btn" data-message="${this.escapeHtml(message)}" style="
                                background: #f8f9fa;
                                border: 1px solid #e9ecef;
                                color: #6c757d;
                                padding: 4px 8px;
                                border-radius: 12px;
                                font-size: 11px;
                                cursor: pointer;
                                transition: all 0.2s;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;">
                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>Copy Editor
                            </button>
                        </div>
                    </div>
                    <div style="font-size: 11px; color: #9ca3af; margin-top: 4px;">
                        ${time}
                    </div>
                </div>
            `;
        } else if (type === 'error') {
            messageHTML = `
                <div class="error-message" style="margin-bottom: 16px;">
                    <div style="
                        background: #fef2f2;
                        color: #dc2626;
                        padding: 12px 16px;
                        border-radius: 12px;
                        display: inline-block;
                        max-width: 80%;
                        font-size: 14px;
                        border: 1px solid #fecaca;
                    ">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px;">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                            <path d="M12 9v4"/>
                            <path d="m12 17 .01 0"/>
                        </svg>
                        ${this.escapeHtml(message)}
                    </div>
                </div>
            `;
        }

        container.append(messageHTML);
        container.scrollTop(container[0].scrollHeight);
    }

    showTyping() {
        this.startTime = Date.now();
        
        const typing = `
            <div id="typingIndicator" class="ai-message" style="margin-bottom: 16px;">
                <div style="
                    background: white;
                    padding: 12px 16px;
                    border-radius: 12px;
                    display: inline-block;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                ">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <img src="/assets/img/ai-icon.png" alt="AI" style="width: 16px; height: 16px; border-radius: 50%; margin-right: 6px;">
                        <span style="font-weight: 600; color: #1E90FF; font-size: 12px;">Raymaizing</span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="typing-dots">
                                <span></span><span></span><span></span>
                            </div>
                            <span style="font-size: 13px; color: #6b7280; font-style: italic;">Sedang memproses...</span>
                        </div>
                        <div id="loadingTimer" style="
                            font-size: 11px;
                            color: #9ca3af;
                            font-family: monospace;
                            background: #f3f4f6;
                            padding: 2px 6px;
                            border-radius: 8px;
                        ">0.00s</div>
                    </div>
                </div>
            </div>
        `;
        $('#chatMessages').append(typing);
        $('#chatMessages').scrollTop($('#chatMessages')[0].scrollHeight);
        
        // Start timer with milliseconds
        this.timerInterval = setInterval(() => {
            const elapsed = (Date.now() - this.startTime) / 1000;
            $('#loadingTimer').text(`${elapsed.toFixed(2)}s`);
        }, 10); // Update every 10ms for smooth animation
    }

    hideTyping() {
        if (this.loadingInterval) {
            clearInterval(this.loadingInterval);
            this.loadingInterval = null;
        }
        if (this.timerInterval) {
            clearInterval(this.timerInterval);
            this.timerInterval = null;
        }
        $('#typingIndicator').remove();
    }

    formatResponse(text) {
        return text
            .replace(/\n/g, '<br>')
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
            .replace(/\*(.*?)\*/g, '<em>$1</em>')
            .replace(/`(.*?)`/g, '<code style="background: #f1f3f4; padding: 2px 4px; border-radius: 3px; font-family: monospace;">$1</code>');
    }

    truncateText(text, maxLength = 50) {
        // Use the same cleaning method for consistency
        const cleanText = this.cleanTextForReply(text);
        
        if (cleanText.length <= maxLength) return cleanText;
        return cleanText.substring(0, maxLength) + '...';
    }

    escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
}

// Initialize AI Chat when module is loaded
const initAIChat = () => {
    if (typeof window !== 'undefined') {
        // Prevent multiple instances
        if (window.aiChat) {
            // Clean up existing instance
            if (window.aiChat.isOpen) {
                window.aiChat.closeChat();
            }
            $('#aiFloatingBtn').remove();
            $('#aiChatWidget').remove();
            $('.copy-button').remove();
        }
        
        window.aiChat = new DraggableAIChat();
        window.aiChat.init();
    }
};

// Auto-initialize
initAIChat();

// Add styles
const addStyles = () => {
    if (document.head.querySelector('#ai-chat-styles')) return;
    
    const styles = document.createElement('style');
    styles.id = 'ai-chat-styles';
    styles.textContent = `
/* AI Chat Base Styles */
#aiFloatingBtn, #aiChatWidget, .copy-button {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    box-sizing: border-box;
}

/* Prevent conflicts with other elements */
#aiFloatingBtn {
    pointer-events: auto !important;
    user-select: none !important;
}

#aiChatWidget {
    pointer-events: auto !important;
}

.copy-button {
    pointer-events: auto !important;
}

.typing-dots {
    display: flex;
    align-items: center;
    gap: 4px;
}
.typing-dots span {
    height: 6px;
    width: 6px;
    background: #1E90FF;
    border-radius: 50%;
    animation: typing 1.4s infinite ease-in-out;
}
.typing-dots span:nth-child(1) { animation-delay: -0.32s; }
.typing-dots span:nth-child(2) { animation-delay: -0.16s; }
@keyframes typing {
    0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
    40% { transform: scale(1); opacity: 1; }
}

#chatMessages::-webkit-scrollbar {
    width: 4px;
}
#chatMessages::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 2px;
}
#chatMessages::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 2px;
}
#chatMessages::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.reply-btn:hover {
    background: #e9ecef !important;
    border-color: #1E90FF !important;
    color: #1E90FF !important;
}

.copy-plain-btn:hover {
    background: #e9ecef !important;
    border-color: #6c757d !important;
    color: #495057 !important;
}

.copy-editor-btn:hover {
    background: #e9ecef !important;
    border-color: #28a745 !important;
    color: #28a745 !important;
}

/* Custom scrollbar for textarea */
#messageInput::-webkit-scrollbar {
    width: 6px;
}
#messageInput::-webkit-scrollbar-track {
    background: #f1f3f4;
    border-radius: 3px;
}
#messageInput::-webkit-scrollbar-thumb {
    background: #1E90FF;
    border-radius: 3px;
}
#messageInput::-webkit-scrollbar-thumb:hover {
    background: #4169E1;
}

/* Enhanced typing animation */
.typing-dots {
    display: flex;
    align-items: center;
    gap: 3px;
}
.typing-dots span {
    height: 6px;
    width: 6px;
    background: #1E90FF;
    border-radius: 50%;
    animation: typing 1.2s infinite ease-in-out;
}
.typing-dots span:nth-child(1) { animation-delay: -0.24s; }
.typing-dots span:nth-child(2) { animation-delay: -0.12s; }
@keyframes typing {
    0%, 80%, 100% { 
        transform: scale(0.6); 
        opacity: 0.4; 
    }
    40% { 
        transform: scale(1); 
        opacity: 1; 
    }
}

@media (max-width: 768px) {
    #aiChatWidget {
        width: calc(100vw - 20px) !important;
        height: calc(100vh - 100px) !important;
        right: 10px !important;
        bottom: 80px !important;
    }
    #aiFloatingBtn {
        bottom: 10px !important;
        right: 10px !important;
        width: 50px !important;
        height: 50px !important;
    }
    #aiFloatingBtn img {
        width: 28px !important;
        height: 28px !important;
    }
}
`;
    document.head.appendChild(styles);
};

// Add styles when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', addStyles);
} else {
    addStyles();
}