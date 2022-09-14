let searchbar = document.getElementById('searchbar');
let container = document.createElement('div');
document.body.appendChild(container);
let rect = searchbar.getBoundingClientRect();
container.className = 'divContainer'
container.style.marginLeft = rect.left.toString() + 'px';
container.style.top = rect.bottom.toString() + 'px';


async function search(){

    if(searchbar.value != ""){
            
    
        container.innerHTML = '';

        const response = await fetch(`../back/searchbar.php?searched=${searchbar.value}`);
       

        const userList = await response.json();

        console.log(userList);

        userList.forEach(async function (user) {

            const searchContainer = document.createElement('div');
            const imageContainer = document.createElement('img');
            const nameUser = document.createElement('span');
            nameUser.className = 'usernameImage';

            nameUser.innerHTML = user.username;

            imageContainer.src = (`../back/upload/profil/${user.image}`);
            imageContainer.className = 'imageSearch';

            searchContainer.appendChild(imageContainer);
            searchContainer.appendChild(nameUser);


            searchContainer.className = 'searchLine';
            
            container.appendChild(searchContainer);
            searchContainer.onclick = function() {
                location = `../inc/album.php?username=${user.email}`;
            }
        })

    }else {
        container.innerHTML = "";
    }
}