<?php
header('Content-Type: text/html; charset=utf-8');
session_start();
?>

<?php include 'header.php'; ?>


    <section id="home" class="animate">
        <div class="container">
            <h1>Bem-vindo ao Sousa e Oliveira Advogados</h1>
            <p>Com décadas de experiência e um compromisso inabalável com a excelência, nossa equipe de advogados está preparada para fornecer soluções jurídicas personalizadas e eficazes para nossos clientes. Seu sucesso é a nossa prioridade.</p>
            <a href="#contact" class="btn">Entre em Contato</a>
        </div>
        <div class="scroll-down">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>
    
    <section id="about" class="animate">
        <div class="container">
            <h2 class="section-title">Sobre Nós</h2>
            <p>No Sousa e Oliveira Advogados, acreditamos que cada cliente é único. Desde a nossa fundação, temos oferecido serviços jurídicos de excelência, construindo uma reputação sólida baseada em confiança, integridade e resultados comprovados. Nossa equipe de advogados é formada por especialistas altamente qualificados, prontos para oferecer as melhores soluções jurídicas em diversas áreas do direito.</p>
        </div>
    </section>
    
    <section id="areas-atuacao" class="animate">
        <div class="container">
            <h2 class="section-title">Áreas de Atuação</h2>
            <div class="area-card">
                <h3>Direito de Família</h3>
                <p>Soluções jurídicas para divórcios, guarda de filhos e partilha de bens.</p>
            </div>
            <div class="area-card">
                <h3>Direito Empresarial</h3>
                <p>Consultoria em formação de empresas, fusões e aquisições, e disputas comerciais.</p>
            </div>
            <div class="area-card">
                <h3>Direito Imobiliário</h3>
                <p>Assessoria jurídica completa em transações imobiliárias, litígios de propriedade, e regularização de imóveis.</p>
            </div>
        </div>
    </section>
    
    <section id="equipe" class="animate">
        <div class="container">
            <h2 class="section-title">Nossa Equipe</h2>
            <div class="profile-card">
                <img src="public/images/advogado1.jpg" alt="Dr. João Sousa">
                <h3>Dr. João Sousa</h3>
                <p>Especialista em Direito Empresarial e Contencioso.</p>
            </div>
            <div class="profile-card">
                <img src="public/images/advogado2.jpg" alt="Dra. Maria Oliveira">
                <h3>Dra. Maria Oliveira</h3>
                <p>Advogada de Família e Sucessões.</p>
            </div>
        </div>
    </section>
    
    <section id="blog" class="animate">
        <div class="container">
            <h2 class="section-title">Últimos Artigos</h2>
            <div class="blog-post">
                <h3>A Importância do Advogado para a Justiça</h3>
                <p>Entenda o papel crucial do advogado na sociedade moderna.</p>
                <a href="#" class="btn">Leia Mais</a>
            </div>
            <div class="blog-post">
                <h3>Recuperação Judicial: Uma Abordagem Estratégica</h3>
                <p>Como a recuperação judicial pode ajudar empresas em dificuldades financeiras.</p>
                <a href="#" class="btn">Leia Mais</a>
            </div>
        </div>
    </section>
    
    <section id="cta" class="animate">
        <div class="container">
            <h2 class="section-title">Agende uma Consultoria Gratuita</h2>
            <p>Entre em contato conosco e receba uma avaliação jurídica inicial sem compromisso. Estamos aqui para ajudar você a navegar pelos desafios legais com segurança e eficácia.</p>
            <a href="#contato" class="btn btn-primary">Agendar Consulta</a>
        </div>
    </section>
    
    <section id="contato" class="animate">
        <div class="container">
            <h2 class="section-title">Fale Conosco</h2>
            <form action="controllers/contact.php" method="post">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
                <label for="phone">Telefone:</label>
                <input type="text" id="phone" name="phone" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Mensagem:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
                <button type="submit" class="btn">Enviar Mensagem</button>
            </form>
            <p>Ou, se preferir, entre em contato diretamente pelo WhatsApp clicando no ícone flutuante.</p>
        </div>
    </section>
    <section id="privacy-policy" class="animate">
        <div id="privacy-policy-popup" class="privacy-popup">
        <div class="privacy-popup-content">
        <span class="close">&times;</span>
        <h2>Política de Privacidade</h2>
        <p>
            Nós, no Sousa e Oliveira Advogados, estamos comprometidos com a proteção da privacidade dos nossos clientes e visitantes. Esta política de privacidade explica como coletamos, usamos, e protegemos suas informações pessoais.
        </p>
        <h3>1. Coleta de Informações</h3>
        <p>
            Coletamos informações pessoais que você nos fornece diretamente, como seu nome, endereço de e-mail, telefone, e outras informações que você optar por compartilhar conosco ao preencher formulários em nosso site ou ao interagir conosco por outros meios.
        </p>
        <h3>2. Uso de Informações</h3>
        <p>
            Utilizamos suas informações pessoais para fornecer serviços jurídicos, responder às suas perguntas, melhorar nossos serviços e comunicar informações relevantes sobre o nosso escritório. Não compartilhamos suas informações com terceiros, exceto quando necessário para cumprir com a lei ou proteger nossos direitos.
        </p>
        <h3>3. Segurança das Informações</h3>
        <p>
            Implementamos medidas de segurança rigorosas para proteger suas informações pessoais contra acesso não autorizado, alteração, divulgação ou destruição. No entanto, nenhum método de transmissão pela internet ou de armazenamento eletrônico é 100% seguro, e não podemos garantir segurança absoluta.
        </p>
        <h3>4. Seus Direitos</h3>
        <p>
            Você tem o direito de acessar, corrigir ou excluir suas informações pessoais a qualquer momento. Se desejar exercer esses direitos, entre em contato conosco por meio dos canais indicados abaixo.
        </p>
        <h3>5. Alterações nesta Política</h3>
        <p>
            Podemos atualizar esta política de privacidade periodicamente para refletir mudanças em nossas práticas ou na legislação aplicável. Recomendamos que você reveja esta política regularmente.
        </p>
        <h3>6. Contato</h3>
        <p>
            Se você tiver alguma dúvida sobre nossa política de privacidade, entre em contato conosco pelo e-mail info@sousaeoliveira.com.br ou pelo telefone (98) 8710-6036.
        </p>
        <button id="accept-privacy" class="btn">Aceitar e Fechar</button>
    </div>
</div>

    </section>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="/public/scripts3.js"></script>
<?php include 'footer.php'; ?>
