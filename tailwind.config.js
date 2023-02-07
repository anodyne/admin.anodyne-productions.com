const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
  content: [
    './resources/**/*.{js,blade.php,css}',
    './vendor/filament/**/*.blade.php',
    './app/View/Components/*.php',
    './app/Filament/Resources/*.php',
    './vendor/livewire-ui/modal/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './safelist.txt',
  ],
  darkMode: 'class',
  theme: {
    fontSize: {
      '2xs': ['0.75rem', { lineHeight: '1.25rem' }],
      xs: ['0.8125rem', { lineHeight: '1.5rem' }],
      sm: ['0.875rem', { lineHeight: '1.5rem' }],
      base: ['1rem', { lineHeight: '1.75rem' }],
      lg: ['1.125rem', { lineHeight: '1.75rem' }],
      xl: ['1.25rem', { lineHeight: '1.75rem' }],
      '2xl': ['1.5rem', { lineHeight: '2rem' }],
      '3xl': ['1.875rem', { lineHeight: '2.25rem' }],
      '4xl': ['2.25rem', { lineHeight: '2.5rem' }],
      '5xl': ['3rem', { lineHeight: '1' }],
      '6xl': ['3.75rem', { lineHeight: '1' }],
      '7xl': ['4.5rem', { lineHeight: '1' }],
      '8xl': ['6rem', { lineHeight: '1' }],
      '9xl': ['8rem', { lineHeight: '1' }],
    },
    typography: require('./typography'),
    extend: {
      borderRadius: {
        '4xl': '2rem',
      },
      boxShadow: {
        glow: '0 0 4px rgb(0 0 0 / 0.1)',
      },
      fontFamily: {
        sans: ['"Inter var"', ...defaultTheme.fontFamily.sans],
        display: ['"Lexend"', ...defaultTheme.fontFamily.sans]
      },
      lineHeight: {
        0: 0,
      },
      colors: {
        transparent: 'transparent',

        primary: colors.purple,
        danger: colors.rose,
        success: colors.emerald,
        warning: colors.amber,
      },
      maxWidth: {
        lg: '33rem',
        '2xl': '40rem',
        '3xl': '50rem',
        '5xl': '66rem',
        '8xl': '88rem',
      },
      opacity: {
        1: '0.01',
        2.5: '0.025',
        7.5: '0.075',
        15: '0.15',
      },
    },
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography')
  ],
};
