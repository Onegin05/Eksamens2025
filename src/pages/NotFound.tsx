
import { useLocation } from "react-router-dom";
import { useEffect } from "react";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";
import { ArrowLeft } from "lucide-react";

const NotFound = () => {
  const location = useLocation();

  useEffect(() => {
    console.error(
      "404 Kļūda: Lietotājs mēģināja piekļūt neesošam ceļam:",
      location.pathname
    );
  }, [location.pathname]);

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-green-50 to-white p-4">
      <div className="text-center max-w-md">
        <div className="mb-6">
          <span className="text-8xl font-bold text-green-600">404</span>
          <div className="mt-2 h-1 w-20 bg-green-500 mx-auto"></div>
        </div>
        
        <h1 className="text-3xl font-bold mb-4 text-gray-800">Ak vai! Lapa nav atrasta</h1>
        <p className="text-xl text-gray-600 mb-8">
          Bet neuztraucieties – jūsu nauda joprojām ir drošībā!
        </p>
        
        <div className="mb-8">
          <svg className="mx-auto w-48 h-48" viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="100" cy="100" r="80" fill="#DCFCE7" />
            <path d="M100 50V150" stroke="#22C55E" strokeWidth="8" strokeLinecap="round" />
            <path d="M70 80L100 50L130 80" stroke="#22C55E" strokeWidth="8" strokeLinecap="round" strokeLinejoin="round" />
            <path d="M75 120H125" stroke="#22C55E" strokeWidth="8" strokeLinecap="round" />
            <path d="M75 140H125" stroke="#22C55E" strokeWidth="8" strokeLinecap="round" />
          </svg>
        </div>
        
        <Button className="gradient-green gap-2" size="lg" asChild>
          <Link to="/">
            <ArrowLeft className="h-5 w-5" />
            Atpakaļ uz sākumlapu
          </Link>
        </Button>
      </div>
    </div>
  );
};

export default NotFound;
