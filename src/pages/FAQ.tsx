
import React from "react";
import { Accordion, AccordionContent, AccordionItem, AccordionTrigger } from "@/components/ui/accordion";
import { Card, CardContent } from "@/components/ui/card";
import { Button } from "@/components/ui/button";
import { FileText } from "lucide-react";
import { Link } from "react-router-dom";

const faqData = [
  {
    question: "Kas ir ZaļāAugsme?",
    answer: "ZaļāAugsme ir finanšu izglītības platforma, kas piedāvā intuitīvus finanšu rīkus, kalkulatorus un izglītojošu saturu, lai palīdzētu cilvēkiem pieņemt gudrākus finanšu lēmumus un sasniegt finanšu stabilitāti."
  },
  {
    question: "Vai ZaļāAugsme pakalpojumi ir bezmaksas?",
    answer: "Jā, lielākā daļa ZaļāAugsme pakalpojumu ir pieejami bez maksas, ieskaitot mūsu finanšu kalkulatorus, izglītojošos rakstus un padomus. Nākotnē mēs plānojam piedāvāt arī premium funkcijas par maksu, bet pamata funkcionalitāte vienmēr būs pieejama bez maksas."
  },
  {
    question: "Kā ZaļāAugsme finanšu kalkulatori var man palīdzēt?",
    answer: "Mūsu finanšu kalkulatori ir izstrādāti, lai palīdzētu jums plānot un pārvaldīt savas finanses dažādās dzīves situācijās. Tie var palīdzēt aprēķināt budžetu, plānot uzkrājumus, prognozēt ieguldījumu atdevi, aprēķināt kredīta maksājumus un daudz ko citu."
  },
  {
    question: "Vai man ir nepieciešams izveidot kontu, lai izmantotu ZaļāAugsme?",
    answer: "Nē, lielāko daļu mūsu rīku un satura var izmantot bez konta izveidošanas. Tomēr, izveidojot kontu, jūs iegūsiet papildu priekšrocības, piemēram, iespēju saglabāt savus aprēķinus, sekot saviem finanšu mērķiem un saņemt personalizētus ieteikumus."
  },
  {
    question: "Vai mani dati ir droši, izmantojot ZaļāAugsme?",
    answer: "Jā, mēs nopietni uztveram datu drošību. Mēs izmantojam mūsdienīgas drošības tehnoloģijas, lai aizsargātu jūsu personīgo un finanšu informāciju. Mēs nekad nepārdosim jūsu datus trešajām pusēm. Lai uzzinātu vairāk, lūdzu, izlasiet mūsu privātuma politiku."
  },
  {
    question: "Vai ZaļāAugsme piedāvā personalizētas finanšu konsultācijas?",
    answer: "ZaļāAugsme galvenokārt piedāvā informatīvus rīkus un resursus. Mēs neaizvietojam profesionālus finanšu konsultantus. Mūsu mērķis ir sniegt jums zināšanas un rīkus, lai jūs varētu pieņemt labākus finanšu lēmumus, bet svarīgiem finanšu lēmumiem mēs iesakām konsultēties ar kvalificētu finanšu speciālistu."
  },
  {
    question: "Kā es varu sazināties ar ZaļāAugsme komandu?",
    answer: "Jūs varat sazināties ar mums, izmantojot kontaktformu mūsu vietnē, sūtot e-pastu uz info@zalaugusme.lv vai zvanot uz +371 29 123 456. Mēs cenšamies atbildēt uz visiem jautājumiem 24-48 stundu laikā."
  },
  {
    question: "Vai ZaļāAugsme ir pieejams mobilajās ierīcēs?",
    answer: "Jā, mūsu vietne ir pilnībā responsīva un darbojas labi gan datorā, gan planšetdatorā, gan mobilajā tālrunī. Nākotnē mēs plānojam izstrādāt arī atsevišķu mobilo lietotni."
  },
  {
    question: "Kā es varu sekot ZaļāAugsme jaunumiem?",
    answer: "Jūs varat sekot mums sociālajos tīklos (Facebook, Twitter, Instagram) vai pierakstīties mūsu ikmēneša jaunumiem, ievadot savu e-pasta adresi mūsu mājas lapas apakšā."
  },
  {
    question: "Vai ZaļāAugsme piedāvā korporatīvās finanšu izglītības programmas?",
    answer: "Jā, mēs piedāvājam pielāgotas finanšu izglītības programmas uzņēmumiem un organizācijām. Lūdzu, sazinieties ar mūsu komandu, lai uzzinātu vairāk par mūsu korporatīvajiem pakalpojumiem."
  },
  {
    question: "Kā es varu ziņot par problēmu vai kļūdu vietnē?",
    answer: "Ja jūs konstatējat kļūdu vai problēmu mūsu vietnē, lūdzu, informējiet mūs, izmantojot kontaktformu vai sūtot e-pastu uz support@zalaugusme.lv. Mēs novērtējam jūsu atsauksmes un cenšamies ātri risināt visas problēmas."
  },
  {
    question: "Vai ZaļāAugsme piedāvā finanšu kursus vai vebinārus?",
    answer: "Jā, mēs periodiski organizējam bezmaksas vebinārus un tiešsaistes kursus par dažādām finanšu tēmām. Lai uzzinātu par nākamajiem pasākumiem, sekojiet mūsu sociālajiem tīkliem vai pierakstieties mūsu jaunumiem."
  }
];

const FAQ = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-4xl mx-auto">
        <div className="mb-12 text-center">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <FileText className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Biežāk Uzdotie Jautājumi</h1>
          <p className="text-lg text-gray-600 max-w-2xl mx-auto">
            Atrodiet atbildes uz biežāk uzdotajiem jautājumiem par ZaļāAugsme pakalpojumiem un to, kā mēs varam palīdzēt jums sasniegt finanšu mērķus.
          </p>
        </div>

        <Card className="mb-8">
          <CardContent className="p-6 md:p-8">
            <Accordion type="single" collapsible className="w-full">
              {faqData.map((item, index) => (
                <AccordionItem key={index} value={`item-${index}`}>
                  <AccordionTrigger className="text-left font-medium text-lg">
                    {item.question}
                  </AccordionTrigger>
                  <AccordionContent className="text-gray-600">
                    {item.answer}
                  </AccordionContent>
                </AccordionItem>
              ))}
            </Accordion>
          </CardContent>
        </Card>

        <div className="text-center">
          <p className="text-lg mb-6">
            Neatradāt atbildi uz savu jautājumu? Sazinieties ar mums tieši!
          </p>
          <Button className="gradient-green" asChild>
            <Link to="/contact">Sazināties ar mums</Link>
          </Button>
        </div>
      </div>
    </div>
  );
};

export default FAQ;
