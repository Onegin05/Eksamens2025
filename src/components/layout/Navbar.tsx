
import React, { useState } from "react";
import { Link, useLocation } from "react-router-dom";
import { Button } from "@/components/ui/button";
import { Calculator, User, Menu, X } from "lucide-react";
import { mainNavigation } from "@/config/navigation";
import {
  NavigationMenu,
  NavigationMenuContent,
  NavigationMenuItem,
  NavigationMenuLink,
  NavigationMenuList,
  NavigationMenuTrigger,
  navigationMenuTriggerStyle,
} from "@/components/ui/navigation-menu";
import { cn } from "@/lib/utils";

const Navbar = () => {
  const [mobileMenuOpen, setMobileMenuOpen] = useState(false);
  const location = useLocation();
  
  const toggleMobileMenu = () => {
    setMobileMenuOpen(!mobileMenuOpen);
  };

  return (
    <header className="sticky top-0 z-50 w-full backdrop-blur-sm bg-white/80 border-b border-gray-200">
      <div className="container flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
        <Link to="/" className="flex items-center gap-2">
          <div className="bg-gradient-to-r from-green-500 to-green-600 p-2 rounded-lg">
            <Calculator className="h-6 w-6 text-white" />
          </div>
          <span className="text-xl font-bold text-gray-800">ZaļāAugsme</span>
        </Link>

        {/* Desktop Navigation */}
        <NavigationMenu className="hidden md:flex">
          <NavigationMenuList>
            {mainNavigation.map((item) => (
              <NavigationMenuItem key={item.path}>
                <Link
                  to={item.implemented ? item.path : "/404"}
                  className={cn(
                    navigationMenuTriggerStyle(),
                    location.pathname === item.path ? "text-green-600 font-medium" : "text-gray-600"
                  )}
                >
                  {item.title}
                </Link>
              </NavigationMenuItem>
            ))}
          </NavigationMenuList>
        </NavigationMenu>

        {/* Mobile Menu Button */}
        <div className="flex md:hidden">
          <Button variant="ghost" size="icon" onClick={toggleMobileMenu}>
            {mobileMenuOpen ? (
              <X className="h-6 w-6 text-gray-600" />
            ) : (
              <Menu className="h-6 w-6 text-gray-600" />
            )}
          </Button>
        </div>

        {/* User Actions */}
        <div className="hidden md:flex items-center gap-3">
          <Button variant="outline" size="sm" className="hidden sm:flex" asChild>
            <Link to="/login">Ieiet</Link>
          </Button>
          <Button size="sm" className="gradient-green" asChild>
            <Link to="/register">Reģistrēties</Link>
          </Button>
        </div>
      </div>

      {/* Mobile Navigation */}
      {mobileMenuOpen && (
        <div className="md:hidden bg-white border-b border-gray-200">
          <div className="container py-4">
            <nav className="flex flex-col space-y-2">
              {mainNavigation.map((item) => (
                <Link
                  key={item.path}
                  to={item.implemented ? item.path : "/404"}
                  className={cn(
                    "py-2 px-4 rounded-md",
                    location.pathname === item.path
                      ? "bg-green-50 text-green-600 font-medium"
                      : "text-gray-600 hover:bg-gray-50"
                  )}
                  onClick={() => setMobileMenuOpen(false)}
                >
                  {item.title}
                </Link>
              ))}
            </nav>
            <div className="flex gap-2 mt-4">
              <Button variant="outline" size="sm" className="w-full" asChild>
                <Link to="/login" onClick={() => setMobileMenuOpen(false)}>Ieiet</Link>
              </Button>
              <Button size="sm" className="gradient-green w-full" asChild>
                <Link to="/register" onClick={() => setMobileMenuOpen(false)}>Reģistrēties</Link>
              </Button>
            </div>
          </div>
        </div>
      )}
    </header>
  );
};

export default Navbar;
