
import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { BookOpen, Calculator, TrendingUp, PiggyBank, CreditCard, Home, Calendar, ArrowRight } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";

const financialTools = [
  {
    id: "budget",
    title: "Budžeta Kalkulators",
    description: "Izveidojiet personalizētu budžeta plānu, balstoties uz jūsu ienākumiem un izdevumiem.",
    icon: <Calculator className="h-8 w-8 text-green-600" />,
    available: true,
    path: "/calculator"
  },
  {
    id: "savings",
    title: "Uzkrājumu Kalkulators",
    description: "Aprēķiniet, cik ātri varat sasniegt savus uzkrājumu mērķus un kā tos paātrināt.",
    icon: <PiggyBank className="h-8 w-8 text-green-600" />,
    available: false,
    path: "/tools/savings"
  },
  {
    id: "investment",
    title: "Ieguldījumu Prognozētājs",
    description: "Vizualizējiet, kā jūsu ieguldījumi var augt laika gaitā ar procentu spēku.",
    icon: <TrendingUp className="h-8 w-8 text-green-600" />,
    available: false,
    path: "/tools/investment"
  },
  {
    id: "loan",
    title: "Kredīta Kalkulators",
    description: "Izpētiet dažādus aizdevumu scenārijus, lai atrastu labāko atmaksas plānu.",
    icon: <CreditCard className="h-8 w-8 text-green-600" />,
    available: false,
    path: "/tools/loan"
  },
  {
    id: "mortgage",
    title: "Hipotēkas Kalkulators",
    description: "Aprēķiniet mēneša maksājumus un kopējās izmaksas dažādiem hipotēkas variantiem.",
    icon: <Home className="h-8 w-8 text-green-600" />,
    available: false,
    path: "/tools/mortgage"
  },
  {
    id: "retirement",
    title: "Pensijas Plānotājs",
    description: "Novērtējiet, cik daudz jums jāuzkrāj, lai nodrošinātu vēlamo pensijas dzīvesveidu.",
    icon: <Calendar className="h-8 w-8 text-green-600" />,
    available: false,
    path: "/tools/retirement"
  }
];

const Tools = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-5xl mx-auto">
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <BookOpen className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Finanšu Rīki</h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Izmantojiet mūsu interaktīvos finanšu rīkus, lai plānotu budžetu, aprēķinātu uzkrājumus un pieņemtu gudrākus finanšu lēmumus.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {financialTools.map((tool) => (
            <Card 
              key={tool.id} 
              className={`hover:shadow-lg transition-shadow duration-300 h-full ${
                tool.available ? "" : "opacity-75"
              }`}
            >
              <CardHeader>
                <div className="mb-2">{tool.icon}</div>
                <CardTitle>{tool.title}</CardTitle>
              </CardHeader>
              <CardContent className="space-y-4">
                <p className="text-gray-600">{tool.description}</p>
                <Button 
                  variant="outline" 
                  className={`w-full ${tool.available ? "hover:bg-green-50 hover:text-green-700" : ""}`}
                  asChild
                >
                  <Link to={tool.available ? tool.path : "/404"}>
                    {tool.available ? "Izmantot rīku" : "Drīzumā pieejams"}
                    {tool.available && <ArrowRight className="ml-2 h-4 w-4" />}
                  </Link>
                </Button>
              </CardContent>
            </Card>
          ))}
        </div>
      </div>
    </div>
  );
};

export default Tools;
