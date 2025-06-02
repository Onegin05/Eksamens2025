
import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import { Tabs, TabsContent, TabsList, TabsTrigger } from "@/components/ui/tabs";
import { Separator } from "@/components/ui/separator";
import { 
  ClipboardList, 
  FlaskConical, 
  Users, 
  Clock,
  CheckCircle2,
  XCircle,
  AlertCircle
} from "lucide-react";

const Testing = () => {
  return (
    <div className="container mx-auto px-4 py-12">
      <div className="max-w-5xl mx-auto">
        <div className="mb-8">
          <div className="inline-block p-2 bg-green-100 rounded-lg text-green-700 mb-4">
            <FlaskConical className="h-6 w-6" />
          </div>
          <h1 className="text-4xl font-bold mb-4">Testēšanas Dokumentācija</h1>
          <p className="text-lg text-gray-600">
            Pārskatiet mūsu testēšanas metodiku, dalībnieku raksturojumu un testēšanas rezultātus.
          </p>
        </div>

        <Tabs defaultValue="methods" className="space-y-6">
          <TabsList className="grid grid-cols-3 w-full max-w-md">
            <TabsTrigger value="methods">Metodika</TabsTrigger>
            <TabsTrigger value="population">Dalībnieki</TabsTrigger>
            <TabsTrigger value="logs">Rezultāti</TabsTrigger>
          </TabsList>

          <TabsContent value="methods" className="space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-center gap-2 mb-2">
                  <ClipboardList className="h-5 w-5 text-green-600" />
                  <CardTitle>6.1. Testēšanas metodes un rīki</CardTitle>
                </div>
              </CardHeader>
              <CardContent className="space-y-4">
                <div>
                  <h3 className="text-lg font-medium mb-2">Izvēlētās metodes</h3>
                  <p className="text-gray-700 mb-4">
                    Mūsu lietotāju pieredzes izpēte balstījās uz kombinētu testēšanas pieeju, kas apvienoja gan kvalitatīvas, gan kvantitatīvas metodes:
                  </p>
                  <ul className="list-disc pl-6 space-y-2 text-gray-700">
                    <li>
                      <span className="font-medium">Lietojamības testēšana</span> — kontrolēta vide, kur dalībnieki izpildīja specifiskus uzdevumus vietnē, kamēr moderatori novēroja un piefiksēja problēmas.
                    </li>
                    <li>
                      <span className="font-medium">A/B testēšana</span> — divu dažādu saskarnes variantu salīdzināšana, lai noteiktu, kurš sniedz labākus rezultātus konversijās un iesaistē.
                    </li>
                    <li>
                      <span className="font-medium">Aptaujas un atsauksmes</span> — strukturētas aptaujas un brīvā formā sniegtās atsauksmes pēc vietnes lietošanas.
                    </li>
                    <li>
                      <span className="font-medium">Analītisko datu analīze</span> — lietotāju uzvedības datu vākšana un analīze, izmantojot analītikas rīkus.
                    </li>
                  </ul>
                </div>

                <Separator />

                <div>
                  <h3 className="text-lg font-medium mb-2">Izmantotie rīki</h3>
                  <ul className="list-disc pl-6 space-y-2 text-gray-700">
                    <li>
                      <span className="font-medium">Hotjar</span> — karstuma kartes un lietotāju sesiju ieraksti
                    </li>
                    <li>
                      <span className="font-medium">Google Analytics</span> — vietnes apmeklējumu un lietotāju uzvedības analīze
                    </li>
                    <li>
                      <span className="font-medium">Maze</span> — attālināta lietojamības testēšana un uzdevumu izpildes analīze
                    </li>
                    <li>
                      <span className="font-medium">Typeform</span> — aptauju veidošana un datu vākšana
                    </li>
                    <li>
                      <span className="font-medium">Optimizely</span> — A/B testu ieviešana un rezultātu analīze
                    </li>
                  </ul>
                </div>

                <Separator />

                <div>
                  <h3 className="text-lg font-medium mb-2">Metožu pamatojums</h3>
                  <p className="text-gray-700">
                    Šāda kombinēta pieeja ļāva gūt gan dziļu izpratni par lietotāju domāšanas procesu un problēmām (kvalitatīvie dati), gan statistiski nozīmīgus datus par vispārējām tendencēm un mērāmiem rezultātiem (kvantitatīvie dati). Īpaši nozīmīga bija lietojamības testēšana, kas atklāja būtiskas lietojamības problēmas finanšu kalkulatora saskarnē, kuras citādi nebūtu identificētas.
                  </p>
                </div>
              </CardContent>
            </Card>
          </TabsContent>

          <TabsContent value="population" className="space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-center gap-2 mb-2">
                  <Users className="h-5 w-5 text-green-600" />
                  <CardTitle>6.2. Testēšanas dalībnieki</CardTitle>
                </div>
              </CardHeader>
              <CardContent className="space-y-4">
                <div>
                  <h3 className="text-lg font-medium mb-2">Dalībnieku atlase</h3>
                  <p className="text-gray-700 mb-4">
                    Testēšanas dalībnieki tika atlasīti, lai pārstāvētu mūsu galvenās lietotāju grupas, nodrošinot demogrāfisku un prasmju līmeņa daudzveidību:
                  </p>
                </div>

                <div className="overflow-x-auto">
                  <table className="w-full border-collapse">
                    <thead>
                      <tr className="bg-green-50">
                        <th className="border border-gray-200 px-4 py-2 text-left">Demogrāfiskā grupa</th>
                        <th className="border border-gray-200 px-4 py-2 text-left">Dalībnieku skaits</th>
                        <th className="border border-gray-200 px-4 py-2 text-left">Finanšu pieredze</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">Jaunieši (18-25)</td>
                        <td className="border border-gray-200 px-4 py-2">12</td>
                        <td className="border border-gray-200 px-4 py-2">Sākuma līmenis</td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">Pieaugušie (26-40)</td>
                        <td className="border border-gray-200 px-4 py-2">15</td>
                        <td className="border border-gray-200 px-4 py-2">Vidējs līmenis</td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">Vidējā vecuma (41-55)</td>
                        <td className="border border-gray-200 px-4 py-2">10</td>
                        <td className="border border-gray-200 px-4 py-2">Dažādi līmeņi</td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">Seniori (56+)</td>
                        <td className="border border-gray-200 px-4 py-2">8</td>
                        <td className="border border-gray-200 px-4 py-2">Dažādi līmeņi</td>
                      </tr>
                      <tr className="bg-green-50">
                        <td className="border border-gray-200 px-4 py-2 font-medium">Kopā</td>
                        <td className="border border-gray-200 px-4 py-2 font-medium">45</td>
                        <td className="border border-gray-200 px-4 py-2">-</td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <Separator />

                <div>
                  <h3 className="text-lg font-medium mb-2">Dalībnieku īpašības</h3>
                  <ul className="list-disc pl-6 space-y-2 text-gray-700">
                    <li>
                      <span className="font-medium">Datorprasmes:</span> No iesācējiem līdz pieredzējušiem lietotājiem
                    </li>
                    <li>
                      <span className="font-medium">Izglītības līmenis:</span> No vidējās līdz augstākajai izglītībai
                    </li>
                    <li>
                      <span className="font-medium">Finanšu pieredze:</span> No minimālas līdz profesionālai
                    </li>
                    <li>
                      <span className="font-medium">Ģeogrāfiskais sadalījums:</span> Gan pilsētu, gan lauku iedzīvotāji
                    </li>
                  </ul>
                </div>

                <Separator />

                <div>
                  <h3 className="text-lg font-medium mb-2">Atlases pamatojums</h3>
                  <p className="text-gray-700">
                    Šāda daudzveidīga testēšanas grupa ļāva mums novērtēt, kā dažādas lietotāju grupas mijiedarbojas ar mūsu platformu. Īpaši vērtīgi bija iekļaut lietotājus ar dažādu finanšu pieredzes līmeni, jo tas palīdzēja atklāt, vai mūsu rīki ir saprotami gan iesācējiem, gan finanšu ekspertiem. Senioru grupas iekļaušana atklāja īpašas pieejamības problēmas, kas bija jārisina.
                  </p>
                </div>
              </CardContent>
            </Card>
          </TabsContent>

          <TabsContent value="logs" className="space-y-6">
            <Card>
              <CardHeader>
                <div className="flex items-center gap-2 mb-2">
                  <Clock className="h-5 w-5 text-green-600" />
                  <CardTitle>6.3. Testēšanas rezultāti</CardTitle>
                </div>
              </CardHeader>
              <CardContent className="space-y-4">
                <div>
                  <h3 className="text-lg font-medium mb-2">Testēšanas kopsavilkums</h3>
                  <div className="flex items-center gap-2 mb-4">
                    <p className="text-gray-700">
                      Testēšanas periods: 2025. gada 10. janvāris - 15. februāris
                    </p>
                  </div>

                  <div className="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div className="bg-green-50 p-4 rounded-lg border border-green-200">
                      <div className="flex items-center justify-between">
                        <span className="font-medium">Veiksmīgie testi</span>
                        <span className="text-green-600 flex items-center gap-1">
                          <CheckCircle2 className="h-4 w-4" /> 32
                        </span>
                      </div>
                    </div>
                    <div className="bg-red-50 p-4 rounded-lg border border-red-200">
                      <div className="flex items-center justify-between">
                        <span className="font-medium">Neveiksmīgie testi</span>
                        <span className="text-red-600 flex items-center gap-1">
                          <XCircle className="h-4 w-4" /> 8
                        </span>
                      </div>
                    </div>
                    <div className="bg-amber-50 p-4 rounded-lg border border-amber-200">
                      <div className="flex items-center justify-between">
                        <span className="font-medium">Daļēji veiksmīgie</span>
                        <span className="text-amber-600 flex items-center gap-1">
                          <AlertCircle className="h-4 w-4" /> 5
                        </span>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="overflow-x-auto">
                  <table className="w-full border-collapse">
                    <thead>
                      <tr className="bg-green-50">
                        <th className="border border-gray-200 px-4 py-2 text-left">Testēšanas datums</th>
                        <th className="border border-gray-200 px-4 py-2 text-left">Komponente</th>
                        <th className="border border-gray-200 px-4 py-2 text-left">Testētājs</th>
                        <th className="border border-gray-200 px-4 py-2 text-left">Problēma/Rezultāti</th>
                        <th className="border border-gray-200 px-4 py-2 text-left">Statuss</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">2025-01-12</td>
                        <td className="border border-gray-200 px-4 py-2">Budžeta Kalkulators</td>
                        <td className="border border-gray-200 px-4 py-2">A. Bērziņš</td>
                        <td className="border border-gray-200 px-4 py-2">Neskaidri kategoriju nosaukumi</td>
                        <td className="border border-gray-200 px-4 py-2">
                          <span className="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Atrisināts</span>
                        </td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">2025-01-15</td>
                        <td className="border border-gray-200 px-4 py-2">Reģistrācijas forma</td>
                        <td className="border border-gray-200 px-4 py-2">L. Zariņa</td>
                        <td className="border border-gray-200 px-4 py-2">Kļūdas paziņojumi nebija skaidri</td>
                        <td className="border border-gray-200 px-4 py-2">
                          <span className="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Atrisināts</span>
                        </td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">2025-01-20</td>
                        <td className="border border-gray-200 px-4 py-2">Mobilā saskarne</td>
                        <td className="border border-gray-200 px-4 py-2">K. Ozols</td>
                        <td className="border border-gray-200 px-4 py-2">Navigācija nekorekti attēlojas iOS</td>
                        <td className="border border-gray-200 px-4 py-2">
                          <span className="px-2 py-1 bg-red-100 text-red-700 text-xs rounded-full">Neizlabots</span>
                        </td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">2025-01-25</td>
                        <td className="border border-gray-200 px-4 py-2">Diagrammas</td>
                        <td className="border border-gray-200 px-4 py-2">G. Liepa</td>
                        <td className="border border-gray-200 px-4 py-2">Leģendas neatšķiramas krāsu akliem</td>
                        <td className="border border-gray-200 px-4 py-2">
                          <span className="px-2 py-1 bg-amber-100 text-amber-700 text-xs rounded-full">Daļēji</span>
                        </td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">2025-02-02</td>
                        <td className="border border-gray-200 px-4 py-2">Uzkrājumu kalkulators</td>
                        <td className="border border-gray-200 px-4 py-2">M. Priede</td>
                        <td className="border border-gray-200 px-4 py-2">Funkcionalitātes tests</td>
                        <td className="border border-gray-200 px-4 py-2">
                          <span className="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Veiksmīgs</span>
                        </td>
                      </tr>
                      <tr>
                        <td className="border border-gray-200 px-4 py-2">2025-02-10</td>
                        <td className="border border-gray-200 px-4 py-2">Bloga komentāri</td>
                        <td className="border border-gray-200 px-4 py-2">J. Egle</td>
                        <td className="border border-gray-200 px-4 py-2">Komentāru iesūtīšanas problēmas</td>
                        <td className="border border-gray-200 px-4 py-2">
                          <span className="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">Atrisināts</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <Separator />

                <div>
                  <h3 className="text-lg font-medium mb-2">Galvenie secinājumi</h3>
                  <ul className="list-disc pl-6 space-y-2 text-gray-700">
                    <li>
                      <span className="font-medium">Lietojamības uzlabojumi:</span> Pēc testēšanas tika ieviesti 18 konkrēti lietojamības uzlabojumi
                    </li>
                    <li>
                      <span className="font-medium">Pieejamības uzlabojumi:</span> Tika uzlabota vietnes pieejamība lietotājiem ar redzes traucējumiem
                    </li>
                    <li>
                      <span className="font-medium">A/B testu rezultāti:</span> Jaunais kalkulatora dizains paaugstināja lietotāju iesaisti par 24%
                    </li>
                    <li>
                      <span className="font-medium">Lietotāju apmierinātība:</span> 85% testētāju novērtēja platformu kā "viegli lietojamu" vai "ļoti viegli lietojamu"
                    </li>
                  </ul>
                </div>
              </CardContent>
            </Card>
          </TabsContent>
        </Tabs>
      </div>
    </div>
  );
};

export default Testing;
