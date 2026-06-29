/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        crm: {
          primary:   '#0F172A',
          secondary: '#1E293B',
          accent:    '#22D3EE',
          highlight: '#818CF8',
          text:      '#E5E7EB',
          muted:     '#94A3B8',
          border:    '#334155',
          surface:   '#273549',
        }
      }
    },
  },
  plugins: [],
}
