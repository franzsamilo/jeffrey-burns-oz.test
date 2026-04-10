import Navbar from "@/components/Navbar";
import HeroSection from "@/components/sections/HeroSection";
import QuizAndGuideSection from "@/components/sections/QuizAndGuideSection";
import IntroducingDreamSmile from "@/components/sections/IntroducingDreamSmile";
import DreamSmileIsSection from "@/components/sections/DreamSmileIsSection";
import ExpertiseSection from "@/components/sections/ExpertiseSection";
import PrimaryServicesSection from "@/components/sections/PrimaryServicesSection";
import ComparisonSection from "@/components/sections/ComparisonSection";
import BurnsProtocolSection from "@/components/sections/BurnsProtocolSection";
import WarrantySection from "@/components/sections/WarrantySection";
import PatientPromiseSection from "@/components/sections/PatientPromiseSection";
import FrustrationsSection from "@/components/sections/FrustrationsSection";
import TestimonialsSection from "@/components/sections/TestimonialsSection";
import AboutDrBurnsSection from "@/components/sections/AboutDrBurnsSection";
import Footer from "@/components/Footer";

export default function Home() {
  return (
    <>
      <a href="#main" className="skip-to-content">
        Skip to content
      </a>
      <Navbar />
      <main id="main">
        <HeroSection />
        <QuizAndGuideSection />
        <IntroducingDreamSmile />
        <DreamSmileIsSection />
        <ExpertiseSection />
        <PrimaryServicesSection />
        <ComparisonSection />
        <BurnsProtocolSection />
        <WarrantySection />
        <PatientPromiseSection />
        <FrustrationsSection />
        <TestimonialsSection />
        <AboutDrBurnsSection />
      </main>
      <Footer />
    </>
  );
}
