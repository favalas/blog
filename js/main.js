function JumpToEndOfPage()
{  
  window.scrollTo(
    { left: 0, top: document.body.scrollHeight || document.documentElement.scrollHeight, behavior: "smooth" }
  );   
};

function JumpToTopOfPage()
{  
  window.scrollTo(
    { left: 0, top: 0, behavior: "smooth" }
  );   
};
