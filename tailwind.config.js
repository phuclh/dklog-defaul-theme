const colors = require('tailwindcss/colors')

module.exports = {
    mode: 'jit',
    purge: {
        content: [
            './resources/views/**/*.blade.php',
            './resources/js/*.js',
        ]
    },
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                orange: colors.orange,
            },

            typography(theme) {
                return {
                    light: {
                        css: {
                            color: theme("colors.gray.400"),
                            '[class~="lead"]': { color: theme("colors.gray.400") },
                            a: { color: theme("colors.gray.100") },
                            strong: { color: theme("colors.gray.100") },
                            "ul > li::before": { backgroundColor: theme("colors.gray.700") },
                            hr: { borderColor: theme("colors.gray.800") },
                            blockquote: {
                                color: theme("colors.gray.100"),
                                borderLeftColor: theme("colors.gray.800"),
                            },
                            figcaption: { color: theme("colors.gray.400"), },
                            h1: { color: theme("colors.gray.100") },
                            h2: { color: theme("colors.gray.100") },
                            h3: { color: theme("colors.gray.100") },
                            h4: { color: theme("colors.gray.100") },
                            code: { color: theme("colors.gray.100") },
                            "a code": { color: theme("colors.gray.100") },
                            pre: {
                                color: theme("colors.gray.200"),
                                backgroundColor: theme("colors.gray.800"),
                            },
                            thead: {
                                color: theme("colors.gray.100"),
                                borderBottomColor: theme("colors.gray.700"),
                            },
                            "tbody tr": { borderBottomColor: theme("colors.gray.800") },
                        },
                    },
                };
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/line-clamp')
    ],
}
