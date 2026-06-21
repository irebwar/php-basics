document.addEventListener('DOMContentLoaded', function() {
    fetchCurrencyRates();
});

async function fetchCurrencyRates() {
    const widgetContainer = document.getElementById('currency-widget');
    if (!widgetContainer) return;

    try {
        const response = await fetch('https://api.exchangerate-api.com/v4/latest/USD');
        if (!response.ok) {
            throw new Error('Network response was not ok ${response.status');
        }

        const data = await response.json();

        let htmlContent = '<ul class="list-group list-group-flush text-start">';

        const targetCurrencies = ['IQD', 'EUR', 'GBP', 'TRY', 'IRR', 'AED'];
        for (const [currency, rate] of Object.entries(data.rates)) {
            if (targetCurrencies.includes(currency)) {
                htmlContent += `
                    <li class="list-group-item d-flex justify-content-between align-items-center bg-transparent px-0 border-secondary border-opacity-25">
                    <span class="fw-bold text-dark text-uppercase">${currency}</span>
                    <span class="badge bg-primary text-white">${rate}</span>
                    </li>
                `
            }
        }
        htmlContent += '</ul>';
        widgetContainer.innerHTML = htmlContent;
    } catch (error) {
        console.error('Error fetching currency rates:', error);
        widgetContainer.innerHTML = '<p class="text-danger">هەڵەیەک ڕوویدا لە کاتی وەرگرتنی نرخەکان.</p>';
    }
}