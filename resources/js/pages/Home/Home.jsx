
import Book1 from '../../../assets/bookcover/book1.jpg';
import Book2 from '../../../assets/bookcover/book2.jpg';
import Book3 from '../../../assets/bookcover/book3.jpg';
import Book4 from '../../../assets/bookcover/book4.jpg';

import React from 'react';
import { Link } from 'react-router-dom';
import { Button } from 'reactstrap';
// import { Swiper, SwiperSlide } from 'swiper/react';
// import { Navigation, Autoplay } from 'swiper';
// import 'swiper/css/navigation';
// import 'swiper/css';

import { Navigation, Pagination, Scrollbar, A11y } from 'swiper';

import { Swiper, SwiperSlide } from 'swiper/react';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/scrollbar';


const Home = (props) => {
    return (
        // <section className="home-page flex-grow-1">
        // <div className="container">
        //   <div className="row align-items-center mb-4">
        //     <div className="col-lg-6">
        //       <h4>On Sale</h4>
        //     </div>
        //     <div className="col-lg-6 d-flex justify-content-end">
        //       <Link to="/shop">
        //         <Button color="secondary" size="sm" to="/shop">
        //           View All &nbsp; <i className="fas fa-angle-right"></i>
        //         </Button>
        //       </Link>
        //     </div>
        //   </div>
        // </div>

        <Swiper className="container mt-3"
            // install Swiper modules
            modules={[Navigation, Pagination, Scrollbar, A11y]}
            spaceBetween={20}
            slidesPerView={4}
            navigation
            pagination={{ clickable: true }}
            scrollbar={{ draggable: true }}
            onSwiper={(swiper) => console.log(swiper)}
            onSlideChange={() => console.log('slide change')}
            >
            <SwiperSlide>Slide 1</SwiperSlide>
            <SwiperSlide>Slide 2</SwiperSlide>
            <SwiperSlide>Slide 3</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>
            <SwiperSlide>Slide 4</SwiperSlide>

            ...
        </Swiper>
    //   </section>
       
    );
}


export default Home;