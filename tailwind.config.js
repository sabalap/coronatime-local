/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                "covid-background": "url('/images/covid-background.png')",
            },
            width: {
                sectionWidth: "1440px",
                loginForm: "448px",
                locationColumn: "70.22px",
                newCasesColumn: "83.11px",
                deathColumn: "61px",
                recoveredColumn: "81px",
                mdLocationColumn: "78.59px",
                mdNewCasesColumn: "93.63px",
                mdDeathColumn: "68.23px",
                mdRecoveredColumn: "92.09px",
            },
            height: {
                countriesDashboard: "547px",
            },
            fontSize: {
                8: "0.5rem",
            },
        },
    },
    plugins: [],
};
