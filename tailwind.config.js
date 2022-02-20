module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: { sans: ['Inter var'] },
    }
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
  ]
}
