import './App.css';
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Layout from './Component/Layout/Layout';
import Home from './Pages/Home/Home';
import Contact from './Pages/ContactUs/ContactUs';
import Service from './Pages/Service/Service';
import ServiceBook from './Pages/Service/ServiceBook';
import ServiceDetails from './Pages/Service/ServiceDetails';
import PaymentRedirect from './Pages/Service/PaymentRedirect';
import Notfound from './Pages/Notfound';
import ScrollToTop from './Pages/ScrollToTop';
// import Consultant from './Pages/Consultants/Consultant';
// import Chatbox from './Pages/Chatbox/Chatbox';
import Consultant from './Pages/Consultants/Consultant';

function App() {
  return (
    <>   
      <BrowserRouter>
        <ScrollToTop /> {/* Add the ScrollToTop component here */}
        <Routes>
          <Route path="/" element={<Layout><Home /></Layout>} />
          <Route path="/contact" element={<Layout><Contact /></Layout>} />
          <Route path="/service" element={<Layout><Service /></Layout>} />
          <Route path="/service-detail/:id" element={<Layout><ServiceDetails /></Layout>} />
          <Route path="/service-Book/:id" element={<Layout><ServiceBook /></Layout>} />
          <Route path="/consultant" element={<Layout><Consultant /></Layout>} />
          {/* <Route path="/Chatbox/:id" element={<Layout><Chatbox /></Layout>} /> */}
          <Route path="/payment-redirect" element={<PaymentRedirect />} />
          <Route path="*" element={<Notfound/>} />
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
