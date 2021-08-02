module.exports = {
  important: true,
  theme: {
    screens: {
      sm: '576px',
      md: '768px',
      lg: '992px',
      xl: '1200px',
    },
    extend: {
      colors: {
        'black-05': 'rgba(0, 0, 0, .05)',
        'black-10': 'rgba(0, 0, 0, .10)',
        'black-20': 'rgba(0, 0, 0, .20)',
        'white-70': 'rgba(255, 255, 255, .70)',
        'black-high': 'rgba(0, 0, 0, .87)',
        'black-medium': 'rgba(0, 0, 0, .60)',
        'black-disabled': 'rgba(0, 0, 0, .38)',
        'white-high': 'rgba(255, 255, 255, .87)',
        'white-medium': 'rgba(255, 255, 255, .60)',
        'white-disabled': 'rgba(255, 255, 255, .38)',
      },
      fontSize: {
        '7xl': '5rem',
      },
      inset: {
        '-24': '-6rem',
        '-20': '-5rem',
        '-16': '-4rem',
        '-8' : '-2rem',
        '-4' : '-1rem',
        '-1': '-0.25rem',
        '-xs': '-0.125rem',
        '1': '0.25rem',
      },
      maxWidth: {
        'page': '75rem',
      },
      minWidth: {
        '105px': '105px',
      },
      spacing: {
        '46\%': '46%',
        '75\%': '75%',
        'xs': '0.125rem',
      },
    }
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'active'],
    opacity: ['responsive', 'hover', 'focus', 'group-hover'],
    textColor: ['responsive', 'hover', 'focus', 'active'],
  },
  plugins: [
    function({ addUtilities, config }) {
      const utilities = {
        '.text-overflow-ellipsis': {
          textOverflow: 'ellipsis'
        },
        '.-translate-y-1': {
          transform: 'translateY(-0.25rem)'
        },
        '.transition-bg': {
          transition: 'background-color 150ms ease-in-out'
        },
        '.transition-border-color': {
          transition: 'border-color 150ms ease-in-out'
        },
        '.transition-shadow-transform': {
          transition: 'box-shadow 150ms ease-out, transform 150ms ease-out'
        },
        '.vh-80': {
          height: '80vh'
        },
      }
      addUtilities(utilities, ['hover'])
    },
    function({ addComponents, config }) {
      const chevron = {
        '.dropdown-menu': {
          minWidth: '100%',
          padding: '.5rem 0',
          boxShadow: '0 20px 40px rgba(0, 0, 0, .10)',
          border: 'none',
          borderRadius: '.25rem',
        },
        '.dropdown-item': {
          padding: '.5rem 1rem',
        },
        '.dropdown-item:active': {
          color: '#212529',
          backgroundColor: 'transparent',
        },
        '.tb-chevron': {
          position: 'absolute',
          display: 'none',
          border: '1px solid rgba(0, 0, 0, .20)',
          backgroundColor: 'rgba(255, 255, 255, .70)',
          color: 'rgba(0, 0, 0, .60)',
          fontSize: config('theme.fontSize.4xl'),
          zIndex: '10',
          cursor: 'pointer',
          userSelect: 'none',
          transition: 'border-color 150ms ease-in-out, color 150ms ease-in-out, opacity 300ms ease-in-out',
        },
        '.tb-chevron:hover': {
          borderColor: 'black',
          color: 'black',
        },
        '.tb-chevron:active': {
          backgroundColor: 'rgba(255, 255, 255, 0.85)',
        },
      }
      addComponents(chevron)
    },
  ]
}
