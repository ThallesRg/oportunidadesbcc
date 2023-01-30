<footer>
  <div class="footer-main">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h5 class="lead footer-hdr">Links relevantes</h5>
            <div class="line-divider"></div>
            <div class="footer-link-list">
             <a href="https://dcm.ffclrp.usp.br/" target="_blank" class="footer-links">Departamento de Computação e Matemática (DCM)</a>
             <a href="https://www.ffclrp.usp.br/" target="_blank"class="footer-links">Faculdade de Filosofia Ciênias e Letras de Ribeirão Preto (FFCLRP)</a>
             <a href="https://www.prefeiturarp.usp.br/" target="_blank"class="footer-links">Prefeitura do campus USP de Ribeirão Preto (PUSP)</a>
             <a href="https://uspdigital.usp.br/jupiterweb/" target="_blank"class="footer-links">JupiterWeb</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
        </div>
        <div class="col-sm-6 col-md-3">
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="footer-links">
            <h3 class="footer-brand mb-2">FFCLRP</h3>
            <div class="footer-link-list">
             <a href="https://goo.gl/maps/4hbDy6LCnr8bbGM69" target="_blank" class="footer-links"><i class="fas fa-compass"></i> Av. Bandeirantes, 3900 - Vila Monte Alegre, Ribeirão Preto - SP, 14040-900</a>
             <a href="tel:1633150646" class="footer-links"><i class="fas fa-phone"></i> (16) 3315-0646</a>
             <a href="tel:1633150429" class="footer-links"><i class="fas fa-phone"></i> (16) 3315 0429</a>
             <a href="mailto:graduacao@listas.ffclrp.usp.br" class="footer-links"><i class="fas fa-envelope"></i> graduacao@listas.ffclrp.usp.br</a>
             <div class="social-links">
               <a href="https://www.facebook.com" target="_blank" class="social-link"><i class="fab fa-facebook"></i></a>
               <a href="https://www.twitter.com"  target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
               <a href="https://www.linkedin.com"   target="_blank" class="social-link"><i class="fab fa-linkedin" ></i></a>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

@push('css')
<style>
  .footer-main{
    background-color:#272727;
    color:#ddd;
  }
  .footer-links{
    padding-top:2rem;
    padding-bottom: 2rem;
  }
  .footer-links .footer-hdr{
    color:#ddd;
  }
  .footer-links .footer-link-list .footer-links{
    display:block;
    color:#ccc;
    padding:3px 0; 
    margin:0;
    font-size:.9rem;
  }
  .footer-links .footer-link-list .footer-links:hover{
    color:white;
  }
  .footer-main .social-links {
    margin:20px 0;
  }
  .footer-main .social-links .social-link{
    background-color:white; 
    color:#333;
    padding:8px 10px;
    border-radius: 50%;
    transition:all .3s ease;
  }
  .footer-main .social-links .social-link:hover{
    color:white;
    background-color:#0261A6;
  }
</style>
@endpush