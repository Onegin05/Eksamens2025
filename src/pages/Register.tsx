
import React, { useState } from "react";
import { Link } from "react-router-dom";
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from "@/components/ui/card";
import { Input } from "@/components/ui/input";
import { Button } from "@/components/ui/button";
import { Label } from "@/components/ui/label";
import { Checkbox } from "@/components/ui/checkbox";
import { toast } from "sonner";
import { Calculator } from "lucide-react";

const Register = () => {
  const [formData, setFormData] = useState({
    firstName: "",
    lastName: "",
    email: "",
    password: "",
    confirmPassword: "",
    agreeTerms: false
  });
  const [isLoading, setIsLoading] = useState(false);

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData(prev => ({ ...prev, [name]: value }));
  };

  const handleCheckboxChange = (checked: boolean) => {
    setFormData(prev => ({ ...prev, agreeTerms: checked }));
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    
    if (formData.password !== formData.confirmPassword) {
      toast.error("Paroles nesakrīt");
      return;
    }
    
    if (!formData.agreeTerms) {
      toast.error("Lūdzu, piekrītiet lietošanas noteikumiem");
      return;
    }
    
    setIsLoading(true);
    
    try {
      const response = await fetch('/api/auth/register.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          firstName: formData.firstName,
          lastName: formData.lastName,
          email: formData.email,
          password: formData.password
        })
      });

      const data = await response.json();

      if (response.ok && data.success) {
        toast.success("Konts veiksmīgi izveidots! Notiek pāradresācija...");
        // Store user data
        localStorage.setItem('user', JSON.stringify(data.user));
        // Redirect to dashboard or home page
        setTimeout(() => {
          window.location.href = '/';
        }, 1500);
      } else {
        toast.error(data.error || "Reģistrācija neizdevās");
      }
    } catch (error) {
      console.error('Registration error:', error);
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
          <h2 className="mt-6 text-3xl font-bold text-gray-900">Izveidot kontu</h2>
          <p className="mt-2 text-gray-600">Pievienojieties mums, lai sāktu pārvaldīt savas finanses</p>
        </div>

        <Card>
          <form onSubmit={handleSubmit}>
            <CardHeader>
              <CardTitle>Reģistrācija</CardTitle>
              <CardDescription>
                Ievadiet savu informāciju, lai izveidotu kontu
              </CardDescription>
            </CardHeader>
            <CardContent className="space-y-4">
              <div className="grid grid-cols-2 gap-4">
                <div className="space-y-2">
                  <Label htmlFor="firstName">Vārds</Label>
                  <Input
                    id="firstName"
                    name="firstName"
                    placeholder="Jānis"
                    value={formData.firstName}
                    onChange={handleChange}
                    required
                  />
                </div>
                <div className="space-y-2">
                  <Label htmlFor="lastName">Uzvārds</Label>
                  <Input
                    id="lastName"
                    name="lastName"
                    placeholder="Bērziņš"
                    value={formData.lastName}
                    onChange={handleChange}
                    required
                  />
                </div>
              </div>
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
                <Label htmlFor="password">Parole</Label>
                <Input
                  id="password"
                  name="password"
                  type="password"
                  placeholder="••••••••"
                  value={formData.password}
                  onChange={handleChange}
                  required
                  minLength={8}
                />
                <p className="text-xs text-gray-500">
                  Parolei jābūt vismaz 8 simbolus garai
                </p>
              </div>
              <div className="space-y-2">
                <Label htmlFor="confirmPassword">Apstiprināt paroli</Label>
                <Input
                  id="confirmPassword"
                  name="confirmPassword"
                  type="password"
                  placeholder="••••••••"
                  value={formData.confirmPassword}
                  onChange={handleChange}
                  required
                />
              </div>
              <div className="flex items-center space-x-2">
                <Checkbox
                  id="agreeTerms"
                  checked={formData.agreeTerms}
                  onCheckedChange={handleCheckboxChange}
                  required
                />
                <Label htmlFor="agreeTerms" className="text-sm font-medium leading-none">
                  Es piekrītu{" "}
                  <Link to="/terms" className="text-green-600 hover:text-green-700">
                    lietošanas noteikumiem
                  </Link>{" "}
                  un{" "}
                  <Link to="/privacy" className="text-green-600 hover:text-green-700">
                    privātuma politikai
                  </Link>
                </Label>
              </div>
            </CardContent>
            <CardFooter className="flex flex-col space-y-4">
              <Button 
                type="submit" 
                className="w-full gradient-green" 
                disabled={isLoading}
              >
                {isLoading ? "Veidojam kontu..." : "Izveidot kontu"}
              </Button>
              <p className="text-center text-sm text-gray-600">
                Jau ir konts?{" "}
                <Link to="/login" className="text-green-600 hover:text-green-700 font-medium">
                  Ielogoties
                </Link>
              </p>
            </CardFooter>
          </form>
        </Card>
      </div>
    </div>
  );
};

export default Register;
