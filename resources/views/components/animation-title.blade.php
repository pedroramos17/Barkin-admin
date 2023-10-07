<div class="max-w-7xl mx-auto text-center" x-data="{
  text: '',
  textArray : ['incrível!', 'inteligente.', 'melhor.', 'mais fácil!', 'automática.'],
  textIndex: 0,
  charIndex: 0,
  pauseEnd: 1500,
  cursorSpeed: 420,
  pauseStart: 20,
  typeSpeed: 110,
  direction: 'forward'
}" x-init="(() => { 

  let typingInterval = setInterval(startTyping, $data.typeSpeed);

function startTyping(){
  let current = $data.textArray[ $data.textIndex ];
  if($data.charIndex > current.length){
       $data.direction = 'backward';
       clearInterval(typingInterval);
       setTimeout(function(){
          typingInterval = setInterval(startTyping, $data.typeSpeed);
       }, $data.pauseEnd);
  }   
     
  $data.text = current.substring(0, $data.charIndex);
  if($data.direction == 'forward'){
      $data.charIndex += 1;
   } else {
      if($data.charIndex == 0){
          $data.direction = 'forward';
          clearInterval(typingInterval);
          setTimeout(function(){
          
              $data.textIndex += 1;
              if($data.textIndex >= $data.textArray.length){
                  $data.textIndex = 0;
              }
          
              typingInterval = setInterval(startTyping, $data.typeSpeed);
          }, $data.pauseStart);
      }
      $data.charIndex -= 1;
   }

}
          
setInterval(function(){
  if($refs.cursor.classList.contains('hidden')){
      $refs.cursor.classList.remove('hidden');
  } else {
      $refs.cursor.classList.add('hidden');
  }
}, $data.cursorSpeed);
})()"
wire:ignore>
  <div class="relative h-auto flex">
    <h2 class=" text-3xl font-black">{{ $slot }}</h2>
    <h2 class="text-3xl font-black" x-text="text"></h2>
    <div class="absolute right-0 top-0 h-full w-1 -mr-2 bg-black" x-ref="cursor"></div>
  </div>
</div>