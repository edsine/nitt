import ntdLogoSrc from '../assets/ntdlogo.jpg';
import image1Src from '../assets/image1.jpg';
import railSrc from '../assets/railway.jpg'

const LogoNtd = () => <img src={ntdLogoSrc} alt="Company Logo" className="logo"/>;
const Image1 = () => <img src={image1Src} alt=""  />;
const RailImg = () => <img src={railSrc} alt="" className='d-block w-100' />;


export {
    LogoNtd,
    Image1,
    RailImg,
};