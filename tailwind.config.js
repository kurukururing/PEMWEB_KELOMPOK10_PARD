/** @type {import('tailwindcss').Config} */
module.exports = {
  // Menggunakan ** untuk semua folder dan * untuk semua file dengan ekstensi tertentu
  content: [
    "./**/*.{php,html,js}" 
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          light: '#fde047',   
          DEFAULT: '#eab308', 
          dark: '#a16207',    
        },
        secondary: {
          light: '#f87171',   
          DEFAULT: '#dc2626', 
          dark: '#991b1b',    
        },
      }
    },
  },
  plugins: [],
}