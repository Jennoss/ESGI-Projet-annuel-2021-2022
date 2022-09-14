async function progressBar (element) {
    const delay = (seconds) => new Promise((resolve) => setTimeout(resolve, 1000 * seconds));
    const time = 500;
    for (let i = 0; i <= time; i+= 1) {
        element.style.width = `${(i / time) * 100}%`;
        await delay(0.01);
    }
    await delay(1);
    document.location = "../inc/connexion.php"
}

progressBar(document.getElementById("test"));