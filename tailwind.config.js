/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.vue",
      "./resources/**/*.js",
  ],
  theme: {
    extend: {
        height:{
            '15hv':'15hv',
            '10hv':'10hv',
            '65hv':'65hv',
        }
    },
  },
  plugins: [],
}

