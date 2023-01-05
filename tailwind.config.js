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
    },
    maxWidth: {
      '1/2': '50%',
      '1/3': '33.33%',
      '1/4': '25%',
      '1/5': '20%',
    }
  },
  plugins: [],
}