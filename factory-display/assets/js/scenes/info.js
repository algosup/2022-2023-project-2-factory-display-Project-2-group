const portBtn = document.querySelector('#portBtn');
const landBtn = document.querySelector('#landBtn');

const portrait = document.querySelector('#portrait');
const landscape = document.querySelector('#landscape');

//! console.log(portBtn);
//! console.log(landBtn);
//! console.log(portrait);
//! console.log(landscape);

function selecPort (){
  portrait.className='active-orientation';
  landscape.className='inactive-orientation';
  //! console.log('portrait');
};

function selecLand (){
  portrait.className='inactive-orientation';
  landscape.className='active-orientation';
  //! console.log('landscape');
};

portBtn.addEventListener('click', selecPort)
landBtn.addEventListener('click', selecLand) 
