module.exports = {
    plugins: [
        require('postcss-import')({
            plugins: [
            ]
        }),
        require('tailwindcss')('./tailwind.config.js'),
        require('postcss-preset-env')({
            autoprefixer: { grid: false },
            features: {
                'nesting-rules': true
            }
        })
    ]
};
