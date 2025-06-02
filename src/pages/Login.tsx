
import React, { useState } from "react";
import { Link } from "react-router-dom";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { Label } from "@/components/ui/label";
import { Checkbox } from "@/components/ui/checkbox";
import { toast } from "sonner";
import { Calculator } from "lucide-react";

const Login = () => {
  const [formData, setFormData] = useState({
    email: "",
    password: "",
    rememberMe: false
  });
  const [isLoading, setIsLoading] = useState(false);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleCheckboxChange = (checked: boolean) => {
    setFormData(prev => ({ ...prev, rememberMe: checked }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setIsLoading(true);
    
    try {
      const response = await fetch('/api/auth/login.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email: formData.email,
          password: formData.password
        })
      });

      const data = await response.json();

      if (response.ok && data.success) {
        toast.success("Ielogošanās veiksmīga! Notiek pāradresācija uz vadības paneli...");
        // Store user data in localStorage if remember me is checked
        if (formData.rememberMe) {
          localStorage.setItem('user', JSON.stringify(data.user));
        }
        // Redirect to dashboard or home page
        setTimeout(() => {
          window.location.href = '/';
        }, 1500);
      } else {
        toast.error(data.error || "Ielogošanās neizdevās");
      }
    } catch (error) {
      console.error('Login error:', error);
      toast.error("Serveris nav pieejams. Lūdzu, mēģiniet vēlāk.");
    } finally {
      setIsLoading(false);
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
      <div className="max-w-md w-full space-y-8">
        <div className="text-center">
          <div className="flex justify-center">
            <div className="bg-gradient-to-r from-green-500 to-green-600 p-3 rounded-xl">
              <Calculator className="h-8 w-8 text-white" />
            </div>
          </div>
          <h2 className="mt-6 text-3xl font-bold text-gray-900">Laipni lūgti atpakaļ</h2>
          <p className="mt-2 text-gray-600">Ielogojieties savā kontā, lai turpinātu</p>
        </div>

        <Card>
          <form onSubmit={handleSubmit}>
            <CardHeader>
              <CardTitle>Ielogošanās</CardTitle>
              <CardDescription>
                Ievadiet savu e-pastu un paroli, lai piekļūtu savam kontam
              </CardDescription>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="space-y-2">
                <Label htmlFor="email">E-pasts</Label>
                <Input
                  id="email"
                  name="email"
                  type="email"
                  placeholder="vards@piemers.lv"
                  value={formData.email}
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="space-y-2">
                <div className="flex items-center justify-between">
                  <Label htmlFor="password">Parole</Label>
                  <Link 
                    to="/forgot-password"
                    className="text-sm text-green-600 hover:text-green-700"
                  >
                    Aizmirsāt paroli?
                  </Link>
                </div>
                <Input
                  id="password"
                  name="password"
                  type="password"
                  placeholder="••••••••"
                  value={formData.password}
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="flex items-center space-x-2">
                <Checkbox
                  id="remember-me"
                  checked={formData.rememberMe}
                  onCheckedChange={handleCheckboxChange}
                />
                <Label htmlFor="remember-me" className="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
                  Atcerēties mani
                </Label>
              </div>
            </CardContent>
            <CardFooter className="flex flex-col space-y-4">
              <Button 
                type="submit" 
                className="w-full gradient-green" 
                disabled={isLoading}
              >
                {isLoading ? "Ielogojamies..." : "Ielogoties"}
              </Button>
              <p className="text-center text-sm text-gray-600">
                Nav konta?{" "}
                <Link to="/register" className="text-green-600 hover:text-green-700 font-medium">
                  Reģistrēties
                </Link>
              </p>
            </CardFooter>
          </form>
        </Card>
      </div>
    </div>
  );
};

export default Login;
