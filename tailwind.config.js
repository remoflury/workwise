/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["**/*.{html,js,php}"],
  theme: {
    extend: {
      container: {
        center: true
      },
      colors: {
        black: "#231f20",
        green: "#456b4d",
        orange: {
          light: "#b07e094D",
          dark: "#b07e09" 
        } 
      },
      fontFamily: {
        'body': ['Proxima Nova', 'sans-serif'],
        'heading': ['Ligurino', 'sans-serif']
      },

      boxShadow: {
        'card': '0 0 30px -15px rgba(35, 31, 32, 0.3)',
      }
    },
    maxWidth: {
      '1/2': '50%',
      '1/3': '33.33%',
      '1/4': '25%',
      '1/5': '20%',
      '3/4': '75%',
    }
  },
  plugins: [],
}