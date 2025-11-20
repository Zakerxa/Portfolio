<template>
    <div class="heroContainer" :style="{ 'background': primaryBg }">

        <div class="aboutbgCover" :style="{ 'background': secondaryBg }"></div>

        <div class="container">
            <div class="row align-items-center pt-5" :style="{ 'color': primaryColor }"
                style="min-height:80vh;overflow-x: hidden; overflow-y: hidden;">

                <!-- Header -->
                <div class="col-12 text-center pb-3 pt-5">
                    <h2 class="fw-bold underline">About Me</h2>
                    <h3 class="mt-3">This is a good time to know about me.</h3>
                </div>
                <!-- Question & Answer -->
                <div class="col-12 col-md-10 col-lg-8 text-start position-relative">
                    <div class="pt-3" v-for="about in abouts" :key="about.id" data-aos="fade-left"
                        data-aos-offset="150">
                        <h4 class="fw-bold"><font-awesome-icon :icon="`fa-solid ${about.icon}`" /> {{ about.qus }}</h4>
                        <p class="fw-bold p-2" v-html="about.ans"></p>
                        <div style="border:2px solid #fff;" class="w-100"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            abouts: [
                {
                    qus: 'Name and Age',
                    icon: 'fa-id-card-clip',
                    ans: "My name is Zin Min Htet. I am a 25-year-old aspiring professional, and I'm ready to take on new challenges."
                },
                {
                    qus: 'Education',
                    icon: 'fa-graduation-cap',
                    ans: "I am currently attending the <a href='https://www.eyu.edu.mm/about/profile' target='_blank' class='text-dark fw-bold'>University of East Yangon</a>, specializing in B.Sc. Physics. I have completed my second year and will be advancing to the third year soon. This academic background emphasizes the analytical skills I bring to coding."
                },
                {
                    qus: 'What I Do',
                    icon: 'fa-code',
                    ans: "I’m a Laravel + Vue.js developer who focuses on building modern and scalable web applications. I create real-time features using WebSockets, manage API integrations, and handle server deployment to ensure fast, secure, and reliable systems."
                },
                {
                    qus: 'Hobbies',
                    icon: 'fa-person-running',
                    ans: 'My primary passion is creating something awesome with coding—turning complex problems into elegant solutions.I enjoy unwinding by watching movies or playing strategic games.'
                },
                {
                    qus: 'History',
                    icon: 'fa-history',
                    ans: 'I started learning programming in 2017, and now I have over 7 years of experience. I’m not very interested in design, but I can handle it if needed. Backend development is my favorite part of coding, and I enjoy creating awesome things. Among all the projects I work on, building Single Page Applications (SPAs) is one of my favorites. Currently, I’m creating SPAs using Laravel and Vue.'
                }
            ]
        }
    },
    props: {
        primaryColor: String,
        primaryBg: String,
        secondaryBg: String
    }
}
</script>

<style lang="scss" scoped>
.heroContainer {
    min-height: 100vh;
    position: relative;
    padding: 0;
    margin: 0;
    // .aboutbgCover{
    //   clip-path: polygon(86% 89%, 100% 74%, 100% 100%, 0% 100%);
    //   position: absolute;
    //   z-index: 0;
    //   top: 0;
    //   bottom: 0;
    //   min-height: 100vh;
    //   width: 100%;
    // }
}
</style>
