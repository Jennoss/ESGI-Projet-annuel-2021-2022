const captchaCont = document.getElementById('cont');
const label = document.getElementById('is-completed');


//nombre d'element dans la captcha (9)
let order = [0, 1, 2, 3, 4, 5, 6, 7, 8];

// meelange les elements
order = randomize(order);

let selected = -1;

function randomize (array) {
    const shuffle = () => {
        // recuperer la taille de la liste
        let currentIndex = array.length,  randomIndex;
        while (currentIndex != 0) {
            // prend un element aléatoire de la liste et reduit le liste de 1, on place a la fois le dernier element et celui tiré aléatoirement dans la liste
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex--;
            [array[currentIndex], array[randomIndex]] = [
            array[randomIndex], array[currentIndex]];
        };
        return array;
    };
    return shuffle();
};

function renderImage (index) {
    const imageCont = document.createElement('div');
    imageCont.className = 'image-cont';
    imageCont.style.backgroundImage = `url(../img/captcha${index + 1}.png)`;
    imageCont.onclick = () => {
        if(selected != -1) {
            const index_previously_selected = order.indexOf(selected);
            const indexselected = order.indexOf(index);
            const temp = order[index_previously_selected];
            order[index_previously_selected] = order[indexselected];
            order[indexselected] = temp;
            renderAllImages();
            selected = -1;
            label.innerText = checkTruth();
        }
        else {
            selected = index;
        }
    }
    captchaCont.appendChild(imageCont);
}

function renderAllImages () {
    captchaCont.innerHTML = '';
    for(let i = 0; i < 9; i++) {
        renderImage(order[i]);
    }
}

function checkTruth () {
    for(let i = 0; i < 9; i++) {
        if (order[i] != i) {
            return false;
        }
    }
    return true;
}

renderAllImages();