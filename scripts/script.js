var sidebarIsOpen = true;
var i;
menuIcon = document.getElementsByClassName('menuText');
toggleButton.addEventListener( 'click', (event) => {
    event.preventDefault();
    if(sidebarIsOpen)
    {
        dashboardSidebar.style.width = '10%';
        dashboardSidebar.style.transition = '.5s all';
        dashboardContentContainer.style.width = '90%';
        dashboardLogo.style.fontSize = '60';
        dashboardLogo.style.width = '60'; 
        for(i=0; i< menuIcon.length; i++)
        {
            menuIcon[i].style.display = 'none';
        }
        document.getElementsByClassName('dashboardMenuLists')[0].style.textAlign = 'center';
        sidebarIsOpen = false;
    }
    else
    {
        dashboardSidebar.style.width = '20%';
        dashboardContentContainer.style.width = '80%';
        dashboardLogo.style.fontSize = '80';
        dashboardLogo.style.width = '80'; 
        for(i=0; i< menuIcon.length; i++)
        {
            menuIcon[i].style.display = 'inline-block';
            
        }
        document.getElementsByClassName('dashboardMenuLists')[0].style.textAlign = 'left';
        sidebarIsOpen = true;
    }
});