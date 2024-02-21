
//function to highlight our heading tag
function changeTags() {

    //grabs the h2 tag and iterates through the list of h2 tags, changes the background color and font size to highlight
    var element = document.getElementsByTagName('h2');

    for (var i = 0; i < element.length; i++)
    {
        element[i].style.background = 'linear-gradient(to right, pink, lightblue)';
        element[i].style.fontSize = '30px';
    }

}

changeTags();


//function to add dates to our concert page
function addDate(){

    //grabs the upcoming id and adds a date to the list of upcoming concerts
    var element = document.getElementById('upcoming');
    var textADD = 'To be Announced!';

    //if there is an element, it will add the date to the list
    if(element){

        //grabs the first index of the list and adds the date to the list
        var first = element.getElementsByTagName('li')[0];

        //if there is a first index, it will append the date to the list
        if(first){
            var newText = document.createTextNode(textADD);
            first.appendChild(newText);
        }
        else{
            var elli = document.createElement('li');
            var newText = document.createTextNode(textADD);
            elli.appendChild(newText);
            element.appendChild(elli);

        }

    }


}
addDate();


//grabs the button and sets the showConcert to false
var button = document.getElementById('show-event');
var showConcert = false;

//function to show the upcoming events, if it is false, show the events, else hide the events
function onShow(){

    //grabs the upcomingEvents id and sets the button to show upcoming events
    var element = document.getElementById('upcomingEvents');

    //when the button is clicked, it will show the upcoming events, assign the button to hide events, and show the image
    if(showConcert === false){

        element.style.display = 'block';
        button.innerHTML = 'Hide Events';
        element.innerHTML = '<p>' + 'This is a teaser for their upcoming show' + '</p>';
        element.innerHTML += '<p>' + 'Image by QuinceCreative source from https://pixabay.com/illustrations/coming-soon-coming-soon-banner-3605857/' + '</p>';

        var image = document.createElement('img');
        image.src = './images/coming-3605857_640.jpg';
        image.alt = 'QuinceCreative image';

        element.appendChild(image);

        showConcert = true;
    }
    //else hide the upcoming events, assign the button to show upcoming events, and hide the image
    else{

        element.style.display = 'none';
        button.innerHTML = 'show upcoming events';
        element.innerHTML = '';
        showConcert = false;
    }


}
button.addEventListener('click', onShow);