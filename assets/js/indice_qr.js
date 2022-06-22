function onScanSuccess(decodedText, decodedResult)
{
    let url = null;

    if (decodedText.startsWith('echoquiz'))
    {
        url = decodedText.substring(9, decodedText.length);

        let bRedirectDiv = document.getElementById('bRedirectContrainer');
        let bRedirect = document.querySelector('#bRedirectContrainer a');
        let qrReader = document.getElementById('qr-reader');

        qrReader.style.display = 'none';
        bRedirectDiv.style.display = 'block';
        bRedirect.href = url;
    }
}

var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", {
    fps: 10,
    qrbox: 250
});

html5QrcodeScanner.render(onScanSuccess);