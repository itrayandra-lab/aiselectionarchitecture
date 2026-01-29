const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    fontFamily: {
      roboto: ["Roboto, sans-serif"],
      poppins: ["Poppins, sans-serif"],
      nunito: ["Nunito, sans-serif"],
      lato: ["Lato, sans-serif"],
      greatVibes: ["Great Vibes, cursive"],
      montserrat: ["Montserrat, sans-serif"],
      abhayaLibre: ["Abhaya Libre, serif"],

      borderRadius: {
        none: "0px",
        md: "3px",
      },
    },
    keyframes: {
      rotate: {
        "0%": { transform: "rotate(0deg)" },
        to: { transform: "rotate(1turn)" },
      },
      ticker: {
        "0%": { transform: "translateX(0%)" },
        "100%": { transform: "translateX(-100%)" },
      },
      slideskew1: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(-10px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew2: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(-15px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew3: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(-5px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew4: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(15px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew5: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(5px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew6: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(8px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew7: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(5px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew8: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(8px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew9: {
        "0%": {
          opacity: "1",
          transform: "translateY(0%)",
        },
        "50%": { transform: "translateY(5px)" },
        "100%": { transform: "translateX(0)" },
      },
      slideskew: {
        "0%": {
          opacity: "1",
          transform: "translateY(0)",
        },
        "50%": { transform: "translateY(5px)" },
        "100%": { transform: "translateX(0)" },
      },
      dzwaveeffect: {
        "0%": {
          transform: "scale(1.1)",
        },

        "100%": {
          transform: "scale(1.2)",
          opacity: "0",
        },
      },
      dzwaveeffect2: {
        "0%": {
          transform: "scale(1.1)",
        },

        "100%": {
          transform: "scale(1.4)",
          opacity: "0",
        },
        movedelement: {
          "0%": {
            transform: "translate(0)",
          },
          "25%": {
            transform: "translate(-10px, -10px)",
          },
          "50%": {
            transform: "translate(-5px, -5px)",
          },
          "75%": {
            transform: "translate(-10px, -5px)",
          },
          "100%": {
            transform: "translate(0)",
          },
        },
      },
    },
    animation: {
      rotate: "rotate 20s infinite linear",
      ticker: "ticker 20s linear infinite",
      slideskew1: "slideskew1 6s ease 0s normal none infinite running",
      slideskew2: "slideskew2 7s ease 0s normal none infinite running",
      slideskew3: "slideskew3 8s ease 0s normal none infinite running",
      slideskew4: "slideskew4 6s ease 0s normal none infinite running",
      slideskew5: "slideskew5 5s ease 0s normal none infinite running",
      slideskew6: "slideskew6 5s ease 0s normal none infinite running",
      slideskew7: "slideskew7 6s ease 0s normal none infinite running",
      slideskew8: "slideskew8 5s ease 0s normal none infinite running",
      slideskew9: "slideskew9 6s ease 0s normal none infinite running",
      slideskew: "slideskew 6s ease 0s normal none infinite running",
      dzwaveeffect: "dzwaveeffect 2.5s ease infinite",
      dzwaveeffect2: "dzwaveeffect2 2.5s ease infinite",
      movedelement: "movedelement 5s linear infinite",
    },

    extend: {
      colors: {
        primary: {
          DEFAULT: "rgb(var(--rgb-primary, 255 94 165) / <alpha-value>)",
          hover: "#ed3d8b",
          rgba: "255 94 165",
        },
        colorTheme1: {
          primary: {
            default: "rgb(var(--rgb-primary, 255 94 165) / <alpha-value>)",
            hover: "#ff8022",
            rgba: "255 94 165",
          },
          secondary: {
            default: "#152332",
          },
        },
        colorTheme2: {
          primary: {
            default: "rgb(var(--rgb-primary, 177 166 132) / <alpha-value>)",
            hover: "#e7232d",
            rgba: "177 166 132",
          },
          secondary: {
            default: "#e7232d",
          },
          title: {
            default: "#633300",
          },
        },
        colorTheme3: {
          primary: {
            default: "rgb(var(--rgb-primary, 15 27 72) / <alpha-value>)",
            hover: "#586bb4",
            rgba: "15 27 72",
          },
          secondary: {
            default: "#586bb4",
          },
          title: {
            default: "#586bb4",
          },
        },
        secondary: "#00becf",
        title: "var(--title)",
        current: "currentColor",
        yellow: "#ffa808",
        blue: "#5543d1",
        gray: "#f8f5ff",
        skyblue: "#00aeff",
        orange: "#ff8853",
        maroon: "#9e0168",
      },
      backgroundColor: (theme) => ({
        primaryhover: "var(--primary-hover)",
        primarylight: "var(--primary-light)",
        primarydark: "var(--primary-dark)",
      }),
      textColor: (theme) => ({
        primaryhover: "var(--primary-hover)",
        primarylight: "var(--primary-light)",
        primarydark: "var(--primary-dark)",
      }),
      borderColor: (theme) => ({
        primaryhover: "var(--primary-hover)",
        primarylight: "var(--primary-light)",
        primarydark: "var(--primary-dark)",
      }),

      spacing: {
        4.5: "1.25rem",
        7.5: "30px",
        15.5: "70px",
        25: "100px",
        1.25: "5px",
        3.75: "15px",
        5.5: "22px",
        6.25: "25px",
        13.5: "50px",
        14.5: "60px",
        17: "68px",
        29: "120px",
        45: "180px",
        4.75: "40px",
      },

      fontSize: {
        "xxs": "10px",
        "4.5xl": "42px",
        "4.75xl": "40px",
      },

      zIndex: {
        1: "1",
        99: "99",
      },
      boxShadow: {
        default: "0 20px 50px 0 rgba(0, 0, 0, 0.1)",
        wrapper: "0 0 3px rgba(0, 0, 0, .1)",
        card: "0 10px 20px 0 rgba(0, 0, 0, .1)",
        cardicon: "0 0 30px 0 rgba(0, 0, 0, .1)",
        frame: "0 0 40px 0 rgba(0, 0, 0, .1)",
      },

      overflow: {
        unset: "unset",
      },
      backgroundSize: {
        full: "100%",
      },
    },
    container: {
      center: true,
      padding: "15px",
    },
    screens: {
      sm: "574px",
      // => @media (min-width: 574px)

      md: "768px",
      // => @media (min-width: 768px)

      lg: "992px",
      // => @media (min-width: 992px)

      "2lg": "1024px",
      // => @media (min-width: 1023px)

      xl: "1200px",
      // => @media (min-width: 1200px)

      xxl: "1400px",
      // => @media (min-width: 1400px)

      "max-sm": { max: "576px" },
      // => @media (max-width: 576px)

      "max-md": { max: "767px" },
      // => @media (max-width: 767px)

      "max-lg": { max: "991px" },
      // => @media (max-width: 991px)

      "max-xl": { max: "1199px" },
      // => @media (max-width: 1199px)

      "max-2xl": { max: "1400px" },
      // => @media (max-width: 1400px)

      "max-3xl": { max: "1600px" },
      // => @media (min-width: 1600px)
    },
  },
  plugins: [],
};
