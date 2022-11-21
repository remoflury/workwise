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
        
      }
    },
  },
  plugins: [],
}