const particlesContainer=document.getElementById("particles-container"),particleCount=80;for(let t=0;t<80;t++)createParticle();function createParticle(){const t=document.createElement("div");t.className="particle";const e=3*Math.random()+1;t.style.width=`${e}px`,t.style.height=`${e}px`,resetParticle(t),particlesContainer.appendChild(t),animateParticle(t)}function resetParticle(t){const e=100*Math.random(),n=100*Math.random();return t.style.left=`${e}%`,t.style.top=`${n}%`,t.style.opacity="0",{x:e,y:n}}function animateParticle(t){const e=resetParticle(t),n=10*Math.random()+10,a=5*Math.random();setTimeout((()=>{t.style.transition=`all ${n}s linear`,t.style.opacity=.3*Math.random()+.1;const a=e.x+(20*Math.random()-10),i=e.y-30*Math.random();t.style.left=`${a}%`,t.style.top=`${i}%`,setTimeout((()=>{animateParticle(t)}),1e3*n)}),1e3*a)}document.addEventListener("mousemove",(t=>{const e=t.clientX/window.innerWidth*100,n=t.clientY/window.innerHeight*100,a=document.createElement("div");a.className="particle";const i=4*Math.random()+2;a.style.width=`${i}px`,a.style.height=`${i}px`,a.style.left=`${e}%`,a.style.top=`${n}%`,a.style.opacity="0.6",particlesContainer.appendChild(a),setTimeout((()=>{a.style.transition="all 2s ease-out",a.style.left=`${e+(10*Math.random()-5)}%`,a.style.top=`${n+(10*Math.random()-5)}%`,a.style.opacity="0",setTimeout((()=>{a.remove()}),2e3)}),10);const o=document.querySelectorAll(".gradient-sphere"),l=5*(t.clientX/window.innerWidth-.5),r=5*(t.clientY/window.innerHeight-.5);o.forEach((t=>{getComputedStyle(t).transform;t.style.transform=`translate(${l}px, ${r}px)`}))}));