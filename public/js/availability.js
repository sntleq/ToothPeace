document.addEventListener('DOMContentLoaded', function () {
    const modeSelect = document.getElementById('availability-mode');
    const recurringFields = document.getElementById('recurring-fields');
    const overrideFields = document.getElementById('override-fields');
    const form = document.getElementById('availabilityForm');

    function setInputsDisabled(container, disabled) {
        const inputs = container.querySelectorAll('input');
        inputs.forEach(input => input.disabled = disabled);
    }

    function toggleFields() {
        const mode = modeSelect.value;
        if (mode === 'available') {
            recurringFields.style.display = 'block';
            overrideFields.style.display = 'none';

            setInputsDisabled(recurringFields, false);
            setInputsDisabled(overrideFields, true);
        } else {
            recurringFields.style.display = 'none';
            overrideFields.style.display = 'block';

            setInputsDisabled(recurringFields, true);
            setInputsDisabled(overrideFields, false);
        }
    }

    toggleFields();
    modeSelect.addEventListener('change', toggleFields);

    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const mode = modeSelect.value;

        if (mode === 'available') {
            form.action = form.getAttribute('data-available-action');
        } else {
            form.action = form.getAttribute('data-override-action');
        }

        form.submit();
    });

    // Hide alert message after 5 seconds
    const alertBox = document.getElementById('alertMessage');
    if (alertBox) {
        setTimeout(() => {
            alertBox.remove();
        }, 5000);
    }
});
