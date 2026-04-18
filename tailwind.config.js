/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./latihan/*.php",
  ],
  theme: {
    extend: {
      colors: {
        // Tema Yellow
        primary: {
          light: '#fde047',   // Yellow 300
          DEFAULT: '#eab308', // Yellow 500
          dark: '#a16207',    // Yellow 700
        },
        // Tema Red
        secondary: {
          light: '#f87171',   // Red 400
          DEFAULT: '#dc2626', // Red 600
          dark: '#991b1b',    // Red 800
        },
      }
    },
  },
  plugins: [],
}