
import React from "react";
import { Link } from "react-router-dom";
import { Calculator } from "lucide-react";
import { footerNavigation } from "@/config/navigation";

const Footer = () => {
  return (
    <footer className="bg-gray-50 border-t border-gray-200 py-12">
      <div className="container px-4 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div className="space-y-4">
            <Link to="/" className="flex items-center gap-2">
              <div className="bg-gradient-to-r from-green-500 to-green-600 p-2 rounded-lg">
                <Calculator className="h-5 w-5 text-white" />
              </div>
              <span className="text-lg font-bold text-gray-800">ZaļāAugsme</span>
            </Link>
            <p className="text-gray-600 text-sm">
              Palīdzam pieņemt gudrākus finanšu lēmumus ar intuitīviem rīkiem un izglītību.
            </p>
          </div>

          {footerNavigation.map((group, idx) => (
            <div key={idx}>
              <h3 className="text-sm font-semibold text-gray-900 mb-4">{group.title}</h3>
              <ul className="space-y-3">
                {group.items.map((item) => (
                  <li key={item.path}>
                    <Link 
                      to={item.implemented ? item.path : "/404"} 
                      className="text-gray-600 hover:text-green-600 text-sm transition-colors"
                    >
                      {item.title}
                    </Link>
                  </li>
                ))}
              </ul>
            </div>
          ))}
        </div>

        <div className="mt-12 pt-8 border-t border-gray-200">
          <p className="text-center text-gray-500 text-sm">
            © {new Date().getFullYear()} ZaļāAugsme Finanšu Pakalpojumi. Visas tiesības aizsargātas.
          </p>
        </div>
      </div>
    </footer>
  );
};

export default Footer;
