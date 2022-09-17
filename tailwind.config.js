/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./public/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        // 'primary': '#2c53a4',
        'primary': {
          100: '#abbadb',
          200: '#96a9d2',
          300: '#8098c8',
          400: '#6b87bf',
          500: '#5675b6',
          600: '#4164ad',
          700: '#2c53a4',
          800: '#284b94',
          900: '#234283'
        },
        'secondary': '#f07e29'
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
  ],
}
