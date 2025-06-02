
import React from "react";
import { Link } from "react-router-dom";
import { Button } from "@/components/ui/button";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Calculator, TrendingUp, PiggyBank, ChevronRight } from "lucide-react";
import MoneyTree from "@/components/animations/MoneyTree";

const FinancialTips = [
  {
    icon: <Calculator className="h-10 w-10 text-green-500" />,
    title: "Sekojiet Saviem Tēriņiem",
    description: "Pirmais solis uz finansiālu brīvību ir izprast, kur aiziet jūsu nauda."
  },
  {
    icon: <TrendingUp className="h-10 w-10 text-green-500" />,
    title: "Nosakiet Skaidrus Mērķus",
    description: "Definējiet, ko vēlaties sasniegt finansiāli īstermiņā un ilgtermiņā."
  },
  {
    icon: <PiggyBank className="h-10 w-10 text-green-500" />,
    title: "Veidojiet Rezerves Fondu",
    description: "Centieties iekrāt 3-6 mēnešu izdevumus neparedzētām situācijām."
  }
];

const Home = () => {
  return (
    <div className="w-full">
      {/* Money Tree Animation */}
      <section className="py-8">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-2xl font-semibold text-gray-800 mb-4">Vērojiet, kā aug Jūsu finanšu zināšanas</h2>
          <MoneyTree />
        </div>
      </section>
      
      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-green-50 to-white py-20 overflow-hidden">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div className="space-y-8 max-w-lg">
              <div className="space-y-4">
                <h1 className="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                  Pārņemiet kontroli pār savu{" "}
                  <span className="text-transparent bg-clip-text bg-gradient-to-r from-green-500 to-green-700">
                    finanšu nākotni
                  </span>
                </h1>
                <p className="text-xl text-gray-600">
                  Plānojiet gudrāk, ietaupiet labāk un vērojiet, kā jūsu nauda aug ar mūsu intuitīvo finanšu kalkulatoru.
                </p>
              </div>
              
              <div className="flex flex-col sm:flex-row gap-4">
                <Button className="gradient-green text-lg py-6" size="lg" asChild>
                  <Link to="/calculator">Sākt Kalkulatoru</Link>
                </Button>
                <Button variant="outline" className="text-lg py-6" size="lg" asChild>
                  <Link to="/about">Uzzināt Vairāk</Link>
                </Button>
              </div>

              <div className="flex items-center gap-4 text-sm text-gray-500">
                <div className="flex -space-x-2">
                  {[1, 2, 3, 4].map((i) => (
                    <div key={i} className="w-8 h-8 rounded-full bg-green-100 border-2 border-white flex items-center justify-center">
                      <span className="text-green-600 text-xs font-medium">L{i}</span>
                    </div>
                  ))}
                </div>
                <p>Pievienojieties 10 000+ lietotājiem, kuri jau uzlabo savus finanses</p>
              </div>
            </div>
            
            <div className="relative">
              <div className="absolute inset-0 bg-gradient-to-r from-green-200 to-green-400 rounded-full opacity-20 blur-3xl"></div>
              <div className="relative bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 animate-float">
                <img 
                  src="https://images.unsplash.com/photo-1579621970795-87facc2f976d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                  alt="Finanšu panelis" 
                  className="w-full h-auto"
                />
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Financial Literacy Section */}
      <section className="py-20 bg-white">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-2xl mx-auto text-center mb-16">
            <h2 className="text-3xl font-bold text-gray-900 mb-4">Finanšu pratība padarīta vienkāršāka</h2>
            <p className="text-lg text-gray-600">
              Sekojiet šiem vienkāršajiem soļiem, lai sāktu ceļu uz finansiālu labklājību un neatkarību.
            </p>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            {FinancialTips.map((tip, index) => (
              <Card key={index} className="card-hover">
                <CardHeader>
                  <div className="mb-4">{tip.icon}</div>
                  <CardTitle>{tip.title}</CardTitle>
                </CardHeader>
                <CardContent>
                  <p className="text-gray-600">{tip.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>

          <div className="mt-16 text-center">
            <Button variant="outline" className="group" asChild>
              <Link to="/tips">
                Apskatīt vairāk finanšu padomus
                <ChevronRight className="ml-2 h-4 w-4 group-hover:translate-x-1 transition-transform" />
              </Link>
            </Button>
          </div>
        </div>
      </section>

      {/* Features Preview Section */}
      <section className="py-20 bg-gradient-to-b from-white to-green-50">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8">
          <div className="max-w-2xl mx-auto text-center mb-16">
            <h2 className="text-3xl font-bold text-gray-900 mb-4">Spēcīgi finanšu rīki</h2>
            <p className="text-lg text-gray-600">
              Mūsu kalkulators nodrošina visu nepieciešamo, lai pārvaldītu savas finanses vienuviet.
            </p>
          </div>

          <div className="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-6 order-2 lg:order-1">
              <div className="space-y-2">
                <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700">
                  <TrendingUp className="h-6 w-6" />
                </div>
                <h3 className="text-xl font-bold text-gray-900">Ienākumu un izdevumu izsekošana</h3>
                <p className="text-gray-600">
                  Viegli pievienojiet, kategorizējiet un uzraugiet visus savus finanšu darījumus vienuviet.
                </p>
              </div>
              
              <div className="space-y-2">
                <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700">
                  <PiggyBank className="h-6 w-6" />
                </div>
                <h3 className="text-xl font-bold text-gray-900">Budžeta pārvaldība</h3>
                <p className="text-gray-600">
                  Nosakiet budžetu dažādām kategorijām un sekojiet savam progresam visa mēneša garumā.
                </p>
              </div>
              
              <div className="space-y-2">
                <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700">
                  <Calculator className="h-6 w-6" />
                </div>
                <h3 className="text-xl font-bold text-gray-900">Interaktīvas diagrammas</h3>
                <p className="text-gray-600">
                  Vizualizējiet savus finanšu datus ar skaistām, interaktīvām diagrammām, kas palīdz izprast tendences.
                </p>
              </div>
              
              <Button className="gradient-green mt-4" asChild>
                <Link to="/calculator">Izmēģināt kalkulatoru</Link>
              </Button>
            </div>
            
            <div className="relative order-1 lg:order-2">
              <div className="absolute inset-0 bg-green-400 rounded-full opacity-20 blur-3xl"></div>
              <img
                src="https://images.unsplash.com/photo-1559526324-593bc073d938?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"
                alt="Finanšu rīki"
                className="relative rounded-2xl shadow-xl animate-float"
              />
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-green-600 text-white">
        <div className="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h2 className="text-3xl font-bold mb-6">Vai esat gatavs uzņemties kontroli pār savām finansēm?</h2>
          <p className="text-xl mb-8 max-w-2xl mx-auto">
            Pievienojieties tūkstošiem lietotāju, kuri jau gudrāk pārvalda savas finanses ar mūsu rīkiem.
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <Button
              size="lg"
              className="bg-white text-green-600 hover:bg-gray-100 hover:text-green-700 px-8 py-6 text-lg"
              asChild
            >
              <Link to="/calculator">Sākt tagad</Link>
            </Button>
            <Button
              variant="outline"
              size="lg"
              className="border-white text-white hover:bg-green-700 px-8 py-6 text-lg"
              asChild
            >
              <Link to="/register">Izveidot kontu</Link>
            </Button>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Home;
