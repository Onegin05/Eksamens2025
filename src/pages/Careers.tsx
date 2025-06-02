
import React from "react";
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { Briefcase, ChevronRight, GraduationCap, Heart, Code, TrendingUp, Users } from "lucide-react";
import { Link } from "react-router-dom";

const jobOpenings = [
  {
    id: 1,
    title: "Finanšu Konsultants",
    department: "Konsultācijas",
    type: "Pilna Slodze",
    location: "Rīga",
    description: "Meklējam pieredzējušu finanšu konsultantu, kas palīdzēs mūsu klientiem pieņemt labākus finanšu lēmumus un sasniegt viņu finanšu mērķus."
  },
  {
    id: 2,
    title: "Vecākais Frontend Izstrādātājs",
    department: "Izstrāde",
    type: "Pilna Slodze",
    location: "Attālināti",
    description: "Pievienojieties mūsu komandai, lai izstrādātu modernās un lietotājiem draudzīgās finanšu lietojumprogrammas, izmantojot jaunākās tīmekļa tehnoloģijas."
  },
  {
    id: 3,
    title: "Mārketinga Speciālists",
    department: "Mārketings",
    type: "Pilna Slodze",
    location: "Rīga",
    description: "Palīdziet mums palielināt mūsu zīmola atpazīstamību un piesaistīt jaunus lietotājus, izmantojot radošas digitālā mārketinga stratēģijas."
  },
  {
    id: 4,
    title: "Datu Analītiķis",
    department: "Datu Zinātne",
    type: "Nepilna Slodze",
    location: "Attālināti",
    description: "Analizējiet lietotāju uzvedības datus un finanšu tendences, lai palīdzētu mums uzlabot mūsu produktus un pakalpojumus."
  }
];

const companyBenefits = [
  {
    icon: <Heart className="h-6 w-6 text-pink-500" />,
    title: "Veselības Apdrošināšana",
    description: "Pilna veselības apdrošināšana visiem darbiniekiem, ieskaitot zobārstniecības un redzes aprūpi."
  },
  {
    icon: <GraduationCap className="h-6 w-6 text-blue-500" />,
    title: "Profesionālā Attīstība",
    description: "Līdz €1000 gadā profesionālās attīstības aktivitātēm, kursiem un konferencēm."
  },
  {
    icon: <TrendingUp className="h-6 w-6 text-green-500" />,
    title: "Akciju Opcijas",
    description: "Iespēja iegūt uzņēmuma akcijas un būt daļai no mūsu izaugsmes stāsta."
  },
  {
    icon: <Code className="h-6 w-6 text-purple-500" />,
    title: "Elastīgs Darba Režīms",
    description: "Strādājiet, kad jums ir produktīvākais laiks, ar elastīgām darba stundām."
  },
  {
    icon: <Users className="h-6 w-6 text-yellow-500" />,
    title: "Komandas Pasākumi",
    description: "Regulāri komandas saliedēšanas pasākumi un ikmēneša socializēšanās aktivitātes."
  }
];

const Careers = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-5xl mx-auto">
        {/* Header */}
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <Briefcase className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Karjera ZaļāAugsme</h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Pievienojieties mūsu komandai un palīdziet mums padarīt finanšu izglītību pieejamāku visiem. 
            Mēs meklējam talantīgus un motivētus cilvēkus, kuri vēlas radīt pozitīvu ietekmi.
          </p>
        </div>

        {/* Culture & Mission Section */}
        <div className="mb-16">
          <div className="bg-gradient-to-r from-green-50 to-green-100 rounded-2xl p-8 md:p-12">
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
              <div>
                <h2 className="text-3xl font-bold mb-4">Mūsu Kultūra un Misija</h2>
                <p className="text-gray-700 mb-6">
                  ZaļāAugsme ir vairāk nekā tikai finanšu rīku uzņēmums. Mūsu misija ir padarīt finanšu izglītību 
                  pieejamu visiem un palīdzēt cilvēkiem pieņemt labākus finanšu lēmumus. Mēs ticam, ka, 
                  strādājot komandā un koncentrējoties uz inovācijām, mēs varam radīt reālu ietekmi uz cilvēku dzīvi.
                </p>
                <p className="text-gray-700">
                  Mūsu kultūra balstās uz sadarbību, radošumu un nepārtrauktu mācīšanos. Mēs vērtējam dažādību 
                  un iekļaušanu, un mēs uzskatām, ka labākās idejas rodas, kad dažādi cilvēki strādā kopā.
                </p>
              </div>
              <div className="rounded-xl overflow-hidden">
                <img 
                  src="https://images.unsplash.com/photo-1559523161-0fc0d8b38a7a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1074&q=80" 
                  alt="Team working together" 
                  className="w-full h-64 object-cover"
                />
              </div>
            </div>
          </div>
        </div>
        
        {/* Benefits Section */}
        <div className="mb-16">
          <h2 className="text-3xl font-bold mb-8 text-center">Mūsu Priekšrocības</h2>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {companyBenefits.map((benefit, index) => (
              <Card key={index} className="hover:shadow-md transition-shadow duration-300">
                <CardContent className="p-6">
                  <div className="flex items-start gap-4">
                    <div className="p-2 rounded-full bg-gray-100">
                      {benefit.icon}
                    </div>
                    <div>
                      <h3 className="font-semibold text-lg mb-1">{benefit.title}</h3>
                      <p className="text-gray-600 text-sm">{benefit.description}</p>
                    </div>
                  </div>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>

        {/* Open Positions */}
        <div className="mb-16">
          <h2 className="text-3xl font-bold mb-8 text-center">Atvērtās Pozīcijas</h2>
          
          <div className="space-y-6">
            {jobOpenings.map((job) => (
              <Card key={job.id} className="hover:shadow-md transition-shadow duration-300">
                <CardHeader className="pb-2">
                  <div className="flex justify-between items-start">
                    <div>
                      <CardTitle>{job.title}</CardTitle>
                      <CardDescription className="mt-1">{job.department} • {job.type} • {job.location}</CardDescription>
                    </div>
                    <Button variant="outline" className="flex items-center gap-2" asChild>
                      <Link to="/404">
                        Pieteikties
                        <ChevronRight className="h-4 w-4" />
                      </Link>
                    </Button>
                  </div>
                </CardHeader>
                <CardContent>
                  <p className="text-gray-600">{job.description}</p>
                </CardContent>
              </Card>
            ))}
          </div>
        </div>

        {/* CTA */}
        <div className="text-center">
          <h2 className="text-2xl font-bold mb-4">Neatradāt piemērotu pozīciju?</h2>
          <p className="text-gray-600 mb-6">
            Mēs vienmēr meklējam talantīgus cilvēkus, kuri var pievienot vērtību mūsu komandai. 
            Nosūtiet savu CV, un mēs sazināsimies ar jums, ja būs piemērota vakance.
          </p>
          <Button className="gradient-green" asChild>
            <Link to="/contact">Sazināties ar mums</Link>
          </Button>
        </div>
      </div>
    </div>
  );
};

export default Careers;
