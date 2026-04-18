/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",            
    "./latihan/*.php",    
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1d4ed8',
        secondary: '#64748b',
      }
    },
  },
  plugins: [],
}