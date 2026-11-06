(function(){
  var $=function(s,c){return (c||document).querySelector(s)},$$=function(s,c){return Array.prototype.slice.call((c||document).querySelectorAll(s))};
  // header dính + nút lên đầu
  var hdr=$('#hdr'),top=$('#totop');
  function onScroll(){var y=window.scrollY;if(hdr)hdr.classList.toggle('is-stuck',y>60);if(top)top.classList.toggle('on',y>600)}
  window.addEventListener('scroll',onScroll,{passive:true});onScroll();
  if(top)top.addEventListener('click',function(){window.scrollTo({top:0,behavior:'smooth'})});
  // menu mobile
  var bg=$('#burger'),nav=$('#nav');
  function closeNav(){nav.classList.remove('open');document.body.classList.remove('nav-open');bg.setAttribute('aria-expanded','false')}
  if(bg&&nav){bg.addEventListener('click',function(){var o=!nav.classList.contains('open');nav.classList.toggle('open',o);document.body.classList.toggle('nav-open',o);bg.setAttribute('aria-expanded',o)});
    document.addEventListener('click',function(e){if(document.body.classList.contains('nav-open')&&!nav.contains(e.target)&&!bg.contains(e.target))closeNav()});
    $$('.sub-t',nav).forEach(function(b){b.addEventListener('click',function(){b.parentNode.classList.toggle('open')})});}
  // hero slider
  var hs=$$('.hero__s'),hi=0,ht,dots=$('.hero__dots');
  function go(n){if(!hs.length)return;hs[hi].classList.remove('on');hi=(n+hs.length)%hs.length;hs[hi].classList.add('on');if(dots)$$('button',dots).forEach(function(d,i){d.classList.toggle('on',i===hi)})}
  function auto(){clearInterval(ht);ht=setInterval(function(){go(hi+1)},6000)}
  if(hs.length>1){hs.forEach(function(_,i){var d=document.createElement('button');d.setAttribute('aria-label','Slide '+(i+1));if(!i)d.className='on';d.addEventListener('click',function(){go(i);auto()});dots.appendChild(d)});
    $('.hero__nav--p').addEventListener('click',function(){go(hi-1);auto()});$('.hero__nav--n').addEventListener('click',function(){go(hi+1);auto()});auto();}
  // tab
  function tabs(sel){$$(sel).forEach(function(box){var bs=$$('[data-tab]',box);bs.forEach(function(b){b.addEventListener('click',function(){bs.forEach(function(x){x.setAttribute('aria-selected',x===b);var p=document.getElementById(x.dataset.tab);if(p)p.hidden=x!==b});var p=document.getElementById(b.dataset.tab);if(p)$$('.reveal',p).forEach(function(r){r.classList.add('in')})})})})}
  tabs('.ptabs');tabs('.dtabs');
  // carousel
  $$('[data-carousel]').forEach(function(c){var t=$('.carousel__track',c);function step(d){var it=t.children[0];if(!it)return;t.scrollBy({left:d*(it.getBoundingClientRect().width+30),behavior:'smooth'})}
    $('.carousel__b--p',c).addEventListener('click',function(){step(-1)});$('.carousel__b--n',c).addEventListener('click',function(){step(1)})});
  // video youtube: bấm mới tải
  $$('[data-yt]').forEach(function(v){v.addEventListener('click',function(){if(v.querySelector('iframe'))return;var f=document.createElement('iframe');f.src='https://www.youtube.com/embed/'+v.dataset.yt+'?autoplay=1&rel=0';f.allow='autoplay; encrypted-media; picture-in-picture';f.allowFullscreen=true;f.title=v.getAttribute('aria-label')||'Video';v.appendChild(f)})});
  // gallery sản phẩm
  $$('[data-gal]').forEach(function(g){var main=$('.pd__main img',g),tt=$('.pd__tt',g);if(!tt)return;var bs=$$('button',tt),cur=0;
    function show(i){cur=(i+bs.length)%bs.length;bs.forEach(function(b,j){b.classList.toggle('on',j===cur)});main.style.opacity=0;setTimeout(function(){main.src=bs[cur].dataset.src;main.style.opacity=1},150);tt.scrollTo({left:bs[cur].offsetLeft-tt.offsetLeft-40,behavior:'smooth'})}
    bs.forEach(function(b,i){b.addEventListener('click',function(){show(i)})});$$('.pd__arr',g).forEach(function(a){a.addEventListener('click',function(){show(cur+ +a.dataset.dir)})})});
  // popup báo giá: nút trong header/dải CTA/sidebar mở popup; trang có form sẵn thì cuộn tới form
  var pop=$('#qpop');
  function openPop(){if(!pop)return;pop.hidden=false;var i=$('input[name=name]',pop);if(i)setTimeout(function(){i.focus()},50)}
  function closePop(){if(pop)pop.hidden=true}
  $$('[data-quote]').forEach(function(a){a.addEventListener('click',function(e){var inline=document.getElementById('bao-gia');if(inline&&a.closest('.pd__btns'))return;e.preventDefault();openPop()})});
  if(pop){$$('[data-close]',pop).forEach(function(x){x.addEventListener('click',closePop)});document.addEventListener('keydown',function(e){if(e.key==='Escape')closePop()})}
  if(/[?&]bg=(ok|err)/.test(location.search)&&!document.getElementById('bao-gia'))openPop();
  // số chạy
  function count(el){var n=+el.dataset.count,s=el.dataset.suf||'';if(!n||n>100000)return;var t0=null;function f(t){if(!t0)t0=t;var p=Math.min(1,(t-t0)/1400);el.textContent=Math.round(n*(1-Math.pow(1-p,3)))+s;if(p<1)requestAnimationFrame(f)}requestAnimationFrame(f)}
  // hiện dần khi cuộn
  var rs=$$('.reveal');
  if('IntersectionObserver' in window){var io=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');var c=$('[data-count]',e.target);if(c&&e.target.classList.contains('stat'))count(c);io.unobserve(e.target)}})},{rootMargin:'0px 0px -8% 0px'});rs.forEach(function(r){io.observe(r)})}
  else rs.forEach(function(r){r.classList.add('in')});
})();
