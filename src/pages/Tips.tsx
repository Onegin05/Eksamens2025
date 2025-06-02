
import React from "react";
import { Card, CardContent } from "@/components/ui/card";
import { BookOpen, ArrowRight, Check, AlertCircle } from "lucide-react";
import { Button } from "@/components/ui/button";
import { Link } from "react-router-dom";

const financialTips = [
  {
    id: 1,
    title: "50/30/20 Budžeta noteikums",
    description: "Sadaliet savus ienākumus šādi: 50% pamatvajadzībām, 30% vēlmēm un 20% uzkrājumiem vai parādu atmaksai.",
    type: "rule"
  },
  {
    id: 2,
    title: "Ārkārtas fonds",
    description: "Izveidojiet ārkārtas fondu, kas sedz 3-6 mēnešu izdevumus negaidītām situācijām.",
    type: "tip"
  },
  {
    id: 3,
    title: "Pirkumu 24 stundu noteikums",
    description: "Pirms liela pirkuma veikšanas nogaidiet 24 stundas, lai izvairītos no impulsīviem tēriņiem.",
    type: "rule"
  },
  {
    id: 4,
    title: "Automatizējiet uzkrājumus",
    description: "Izveidojiet automātisku pārskaitījumu uz uzkrājumu kontu katru algas dienu.",
    type: "tip"
  },
  {
    id: 5,
    title: "Parāda lavīnas metode",
    description: "Vispirms atmaksājiet mazākos parādus, lai gūtu motivāciju turpināt.",
    type: "tip"
  },
  {
    id: 6,
    title: "Nekad neaizņemieties vairāk kā 30% no ienākumiem",
    description: "Kopējie ikmēneša parādu maksājumi nedrīkst pārsniegt 30% no jūsu ienākumiem.",
    type: "rule"
  },
  {
    id: 7,
    title: "Plānojiet lielus pirkumus",
    description: "Plānojiet lielus pirkumus vismaz 3 mēnešus iepriekš, lai izvairītos no kredītu izmantošanas.",
    type: "tip"
  },
  {
    id: 8,
    title: "Investējiet agrāk, nevis vēlāk",
    description: "Pat nelielas summas, investētas agrāk, var augt ievērojami pateicoties procentu spēkam.",
    type: "rule"
  },
  {
    id: 9,
    title: "Veiciet regulāras finanšu revīzijas",
    description: "Katru ceturksni pārskatiet savus tēriņus un budžetu, lai identificētu uzlabojumu iespējas.",
    type: "tip"
  },
  {
    id: 10,
    title: "Diversificējiet ieguldījumus",
    description: "Nenovietojiet visas olas vienā grozā - sadaliet ieguldījumus dažādās aktīvu klasēs.",
    type: "rule"
  },
  {
    id: 11,
    title: "Izmantojiet cenu salīdzināšanas rīkus",
    description: "Pirms pirkuma veikšanas salīdziniet cenas dažādos veikalos, lai atrastu labāko piedāvājumu.",
    type: "tip"
  },
  {
    id: 12,
    title: "Maksājiet sev vispirms",
    description: "Novirziet daļu no ienākumiem uzkrājumiem, pirms tērējat naudu jebkam citam.",
    type: "rule"
  }
];

const Tips = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-5xl mx-auto">
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <BookOpen className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Naudas Padomi</h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Praktiski finansiālie padomi un vadlīnijas, kas palīdzēs jums veidot veselīgākus naudas ieradumus un sasniegt finanšu stabilitāti.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          {financialTips.map((tip) => (
            <Card 
              key={tip.id} 
              className={`hover:shadow-lg transition-shadow duration-300 border-l-4 ${
                tip.type === "rule" ? "border-l-blue-500" : "border-l-green-500"
              }`}
            >
              <CardContent className="p-6">
                <div className="flex items-start gap-4">
                  <div className={`p-2 rounded-full ${
                    tip.type === "rule" ? "bg-blue-100 text-blue-600" : "bg-green-100 text-green-600"
                  }`}>
                    {tip.type === "rule" ? <AlertCircle className="h-5 w-5" /> : <Check className="h-5 w-5" />}
                  </div>
                  <div className="space-y-2">
                    <h3 className="font-bold text-lg">{tip.title}</h3>
                    <p className="text-gray-600">{tip.description}</p>
                  </div>
                </div>
              </CardContent>
            </Card>
          ))}
        </div>

        <div className="mt-16 text-center">
          <Button className="gradient-green" asChild>
            <Link to="/calculator">
              Izmēģiniet mūsu finanšu kalkulatoru
              <ArrowRight className="ml-2 h-4 w-4" />
            </Link>
          </Button>
        </div>
      </div>
    </div>
  );
};

export default Tips;
