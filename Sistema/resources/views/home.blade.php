@extends('template')

@section('conteudo')



    <div class="hero">
        <img src="imgs/predio.jpg" alt="Prédio" class="hero-image">
        <div class="hero-content-container">
            <h1 class="hero-title">CONHEÇA OS</h1>
            <h2 class="hero-subtitle">NOSSOS SERVIÇOS!</h2>
            <a href="#" class="hero-button">Saiba Mais!</a>
        </div>
    </div>

    <section class="quem-somos" id="sobre">
        <div class="quem-somos-text">
            <h2 class="quem-somos-title">QUEM SOMOS</h2>
            <p class="quem-somos-paragraph">Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo.</p>
            <p class="quem-somos-paragraph">Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo.</p>
        </div>
        <div class="quem-somos-image">
            <img src="imgs/ICONE 1.png" alt="Handshake">
        </div>
    </section>

    <section class="o-que-fazemos">
        <div class="o-que-fazemos-image">
            <img src="imgs/ICONE 2.png" alt="Polegar para cima com estrelas">
        </div>
        <div class="o-que-fazemos-text">
            <h2 class="o-que-fazemos-title">O QUE FAZEMOS</h2>
            <p class="o-que-fazemos-paragraph">Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo.</p>
            <p class="o-que-fazemos-paragraph">Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo, Isto é um texto de exemplo.</p>
        </div>
    </section>

    <section class="formulario-section" id="formulario">
        <div class="formulario-container">
            <h2 class="formulario-title">FORMULÁRIO</h2>
            <form action="#" method="POST">
                <div class="formulario-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu Nome">
                </div>
                <div class="formulario-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Seu Email">
                </div>
                <div class="formulario-group">
                    <label for="telefone">Telefone:</label>
                    <input type="tel" id="telefone" name="telefone" placeholder="Seu Telefone">
                </div>
                <div class="formulario-group">
                    <label for="endereco">Endereço:</label>
                    <input type="text" id="endereco" name="endereco" placeholder="Seu Endereço">
                </div>
                <div class="formulario-group">
                    <label for="mensagem">Mensagem:</label>
                    <textarea id="mensagem" name="mensagem" placeholder="Sua Mensagem"></textarea>
                </div>
                <button type="submit" class="formulario-button">Enviar Mensagem</button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <img src="imgs/MARCA DAGUA BRANCO 2.png" alt="Logo Avalliar Footer" class="footer-logo">
        <p class="footer-copyright">@2025 Avallia - All Copyrights Reserved</p>
    </footer>

    <script>
        // Substitua 'logo.png', 'predio.jpg', 'handshake.png', 'thumb_up_stars.png'
        // e 'logo_footer.png' pelos seus arquivos de imagem reais.
        // Certifique-se de que os caminhos para os arquivos estejam corretos.
    </script>
@endsection
