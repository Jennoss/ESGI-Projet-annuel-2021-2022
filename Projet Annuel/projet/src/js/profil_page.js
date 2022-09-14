let fileToUpload = document.getElementById("fileToUpload");
let galleryUpload = document.getElementById("galleryUpload");
let output = document.getElementById("output");
let imgMini = document.getElementById("img-mini");
let navLink = document.getElementsByClassName("nav-item");
let imageGallery = document.getElementsByClassName("image-gallery");
let imgModal = document.getElementById("img-modal");
let comment = document.getElementById("comment");
let commentContainer =document.getElementsByClassName('comment-container')[0];
let fileToUploadProfil = document.getElementById("profil-image-upload");
let _form = document.getElementById('form-upload');



function timeAgo(timestamp){
    let ago = new Date(timestamp);
    let currentTime = new Date();
    let timeDifference = currentTime - ago;
    

    let seconds = timeDifference;
    let minutes = Math.round(seconds / 60000 );   // => 60 seconds
    let hours = Math.round(seconds / 3600000);    // => 3600 60 min
    let days = Math.round(seconds / 86400000);    // => 86400 = 24*60*60
    let weeks = Math.round(seconds / 604800000);  // 7*27*60*60
    let months = Math.round(seconds / 2629440000); // ((365+365+365+365+365) / 5 / 12) * 24 * 60 * 60
    let years = Math.round(seconds / 31553280000);

    if(seconds <= 60){
        return "A l'instant";

    }else if(minutes <= 60){
        if(minutes <= 1){
            return "A l'instant";
        }
        else{
            return `${minutes} minutes`;
        }

    }else if(hours <= 24){
        if(hours == 1){
            return "1 heure";
        }
        else{
            return `${hours} heures`;
        }

    }else if(days <= 7){
        if(days == 1 ){
            return "Hier";
        }else {
            return `${days} jours`;
        }

    }else if(weeks <= 4.3){
        if(weeks == 1){
            return "1 semaine";
        }else {
            return `${weeks} semaines`;
        }

    }else if(months <= 12){
        if(months == 1){
            return "1 mois";
        }
        else {
            return `${months} mois`;
        }

    }else {
        if(years == 1){
            return "Il y a un an";
        }else {
            return `${years} ans`;
        }
    }
}




for(let i = 0; i < imageGallery.length; i++) {
    imageGallery[i].addEventListener("click", function(event){
        imgModal.src = event.target.src;
        imgModal.setAttribute('img-id', event.target.getAttribute('img-id'));
        renderComments();
    })
    }



function btnClick() {
    fileToUpload.click();
}

fileToUpload.onchange = () => {
    _form.submit();
}

function btnClickGallery() {
    galleryUpload.click();
    output.removeAttribute("hidden");
    imgMini.removeAttribute("hidden");
}

for(let i = 0; i < navLink.length ; i++){
    navLink[i].addEventListener("click", function(event){
        clickActive(event);
    });
}

function clickActive(event) {
    let active = document.getElementsByClassName("active")[0];
    active.classList.remove("active");
    event.target.classList.add("active");
}



function toggleNavbar(){
    let toggle = document.getElementById("toggle-nav");
    let show = document.getElementById("show");
    let hide = document.getElementById("hide");
    
    if (toggle.style.display === "none" && hide.style.display === "none") {
        hide.style.display = "block";
        show.style.display = "none";
        toggle.style.display = "block";

    } else {
        hide.style.display = "none"
        show.style.display = "block";
        toggle.style.display = "none";
    }
  }



  function home(){
    location.href="../inc/home_news.php";
  }

  function logout() {
      location.href="../inc/logout.php";
  }

  
async function redirectionDeleteGallery() {
    await fetch('../back/deleteGallery.php?id=' + imgModal.getAttribute('img-id')).then(response => {
        location.reload();
    })
}

if(comment != null){
    comment.addEventListener('keypress', async function(e){
        if(e.key === 'Enter'){
            console.log('comment');
            await fetch(`../back/comment.php?id=${imgModal.getAttribute('img-id')}&content=${comment.value}`);
            comment.value='';
            renderComments();
        }
    })
}



async function renderComments(){
    commentContainer.innerHTML = '';
    const id = imgModal.getAttribute('img-id');
    const comments = await fetch(`../back/getComments.php?id=${id}`).then(response =>{
        return response.json();
    })
    for(let i = comments.length-1; i >= 0; i--){
        const _comment = comments[i];
        const _dateAjout = _comment.date_ajout;
        const container = document.createElement('div');
        const getDate = timeAgo(_dateAjout);
        container.className = 'container-fluid containerComment';
        const miniContainer = document.createElement('div');
        const colContainer = document.createElement('div');
        miniContainer.appendChild(colContainer);
        miniContainer.className = 'row';
        container.appendChild(miniContainer);

        const image = await fetch(`../back/imageRequest.php?user=${_comment.auteur}`).then(async response => {
            const json = await response.json();
            return json;

        }).then(response => {
            return response;
        }) 
         
        const username = await fetch(`../back/userRequest.php?user=${_comment.auteur}`).then(async response => {
            const json = await response.json();
            return json;

        }).then(response => {
            return response;
        }) 




        const iconUser = document.createElement('img');
        iconUser.src = '../back/upload/profil/' + image;
        colContainer.appendChild(iconUser);
        const textContainer = document.createElement('div');
        miniContainer.appendChild(textContainer);
        colContainer.className = 'col-sm-2 d-flex colContainer';


        const text = document.createElement('span');
        const usernameSpan = document.createElement('span');
        usernameSpan.innerHTML = username;
        usernameSpan.className = 'usernameComment';

        const dateContainer = document.createElement('span');

        
        text.className = 'text-comment';
    
        textContainer.appendChild(text);
        text.appendChild(usernameSpan);
        text.innerHTML += _comment.content;

        textContainer.appendChild(dateContainer);
        dateContainer.className = 'ago';
        dateContainer.innerHTML = getDate;

        const heartContainer = document.createElement('div');

        miniContainer.appendChild(heartContainer);
        heartContainer.className = 'col-2';
        const heart = document.createElement('i');
        heartContainer.appendChild(heart);
        heart.className = 'fa-regular fa-heart fa-2xs heart';
        heart.style.display = 'block';
        heart.style.marginTop = '50%';

        heart.addEventListener('click', function(){
            if(heart.classList.contains('fa-regular')){
                heart.classList.remove('fa-regular');
                heart.classList.add('fa-solid');
            } else {
                heart.classList.remove('fa-solid');
                heart.classList.add('fa-regular');
            }
        })
        
        textContainer.className = 'col-sm-8 textContainer';
        iconUser.className = 'commentAvatar img-fluid';


        // RIEN EN DESSOUS
        commentContainer.appendChild(container);

    }
}



