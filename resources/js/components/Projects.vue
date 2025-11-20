<template>
    <div class="heroContainer" id="projects" :style="{ 'background': secondaryBg }">

        <div class="container pt-3">
            <div class="row align-items-center justify-content-center pt-5 pb-5" :style="{ 'color': primaryColor }"
                style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">

                <!-- Header -->
                <div data-aos="zoom-in" data-aos-offset="200" class="col-12 text-center pb-4">
                    <h2 class="fw-bold underline">Some of my Projects</h2>
                </div>

                <div class="slickSlider mt-2 mt-md-5 pb-3">
                    <div v-for="project in projects" :key="project.id" class="text-center m-3">
                        <project-card :projectData="project" :primaryBg="primaryBg" :primaryColor="primaryColor"
                            :secondaryBg="secondaryBg"></project-card>
                    </div>
                </div>

            </div>
        </div>


    </div>
</template>

<script>
import projectCard from './projectCard.vue';


export default {
    data() {
        return {
            projects: [
                {
                    id: 1,
                    name: 'TeachHub',
                    github: 'https://github.com/Zakerxa/TeachHub',
                    liveDemo: 'https://teachhub.zakerxa.com',
                    language: ['Vue', 'Laravel', 'Api', 'Bootstrap'],
                    images: ['/images/projects/teachHub/teachHub.png', '/images/projects/teachHub/teachHub2.png', '/images/projects/teachHub/teachHub3.png'],
                    details: 'Discover qualified teachers in your city and give your child the gift of personalized learning.Connect with us and let’s shape the future of education together.'
                },
                {
                    id: 2,
                    name: 'Thida AutoCenter',
                    github: 'https://github.com/Zakerxa/Cars-Exporter',
                    liveDemo: 'https://thidaautocenter.com/',
                    language: ['PHP', 'VueJs', 'Bootstrap'],
                    images: ['/images/projects/carExporter/carHome.png', '/images/projects/carExporter/carDetails.png'],
                    details: 'Thida Auto Center is a US based professional car export company and we offer one stop car import service worldwide. I do not support you to testing in that contact form. '
                },
                {
                    id: 3,
                    name: 'Code Share',
                    github: 'https://github.com/Zakerxa/Private-CodeShare',
                    liveDemo: 'https://code.zakerxa.com',
                    language: ['PHP', 'VueJs', 'Javascript', 'Bootstrap'],
                    images: ['/images/projects/codeShare/codeHome.png', '/images/projects/codeShare/codeUpload.png'],
                    details: 'This is Private Code Share website anyway you can call web application.Try to upload your private code here.'
                },

                {
                    id: 4,
                    name: 'Tic Tac Toe',
                    github: 'https://github.com/Zakerxa/Tic-Tac-Toe',
                    liveDemo: 'https://zakerxa.github.io/Tic-Tac-Toe/',
                    language: ['VueJs', 'Javascript', 'Bootstrap'],
                    images: ['/images/projects/ttt/tttPlay.png', '/images/projects/ttt/tttWin.png'],
                    details: 'This is Tic Tac Toe solo play game.You can play Easy, Normal & Impossible Mode. Try to win !'
                },
                {
                    id: 5,
                    name: 'Social Media',
                    github: 'https://github.com/Zakerxa/Social-Media',
                    liveDemo: 'https://media.zakerxa.com',
                    language: ['PHP', 'VueJs', 'Javascript', 'Bootstrap'],
                    images: ['/images/projects/socialMedia/socialMediaHome.png', '/images/projects/socialMedia/socialMediaFri.png', '/images/projects/socialMedia/socialMediaProfile.png'],
                    details: 'This is Social Media like Facebook.You can create account and post ,reaction ,like & comment.'
                },
                {
                    id: 6,
                    name: 'Dhamma Media',
                    github: 'https://github.com/Zakerxa/Dhamma-Media-MP3',
                    liveDemo: 'https://dhamma-zakerxa.vercel.app/',
                    language: ['VueCli', 'Bootstrap'],
                    images: ['/images/projects/dhamma/dhamma1.png', '/images/projects/dhamma/dhamma3.png'],
                    details: 'Dhamma Media is a MP3 Web Application,But now this api is not working that\' is why you can\'t see & hear images & mp3.'
                },
                {
                    id: 7,
                    name: 'Login/Register',
                    github: 'https://github.com/Zakerxa/PHP-LogIn-Register-Security',
                    liveDemo: 'https://account.zakerxa.com',
                    language: ['PHP', 'Bootstrap'],
                    images: ['/images/projects/login-register/login.png', '/images/projects/login-register/register.png', '/images/projects/login-register/success.png', '/images/projects/login-register/authuser.png'],
                    details: 'PHP Login / Register Security that can prevent you from attacking CSRF, XSS, SQL Injection & other.'
                }
            ],
            options: {
                dots: true,
                infinite: false,
                speed: 300,
                arrows: true,
                centerMode: false,
                centerPadding: '20px',
                slidesToShow: 3,
                slidesToScroll: 2,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            arrows: false,
                            centerPadding: '40px',
                            slidesToShow: 2,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            mobileFirst: true,
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            }
        }
    },
    components: {
        projectCard
    },
    props: {
        primaryColor: String,
        primaryBg: String,
        secondaryBg: String
    },
    mounted() {
        $('.slickSlider').slick(this.options);
    }
}
</script>

<style lang="scss" scoped>
.heroContainer {
    min-height: 100vh;
    position: relative;
    padding: 0;
    margin: 0;
}
</style>
