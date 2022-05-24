let initialTheme = true;

function toggleColors() {   
  const root = document.documentElement;

  if(initialTheme) {

    root.style.setProperty('--background', 'navy');
    root.style.setProperty('--background2', 'rgb(47, 47, 153)');
    root.style.setProperty('--main-color', '#fe7a15');
    root.style.setProperty('--second-color', '#FF8E6E');
    root.style.setProperty('--third-color', '#FFBB91');
    root.style.setProperty('--text-color', 'white');
    root.style.setProperty('--two-text-color', '#D3E0EA');


    initialTheme = false;  
  } else {
    root.style.setProperty('--background', 'white');
    root.style.setProperty('--background2', '#ECECEB');
    root.style.setProperty('--main-color', '#fe7a15');
    root.style.setProperty('--second-color', '#537ec8');
    root.style.setProperty('--third-color', '#10316b');
    root.style.setProperty('--text-color', 'black');
    root.style.setProperty('--two-text-color', '#727272');

    
    initialTheme = true;
  }
}