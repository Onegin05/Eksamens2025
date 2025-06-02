
import React, { useState } from "react";
import { Button } from "@/components/ui/button";
import { MessageSquare, X } from "lucide-react";
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
} from "@/components/ui/dialog";
import { Input } from "@/components/ui/input";
import { Label } from "@/components/ui/label";
import { Textarea } from "@/components/ui/textarea";
import { toast } from "sonner";

const ContactButton = () => {
  const [open, setOpen] = useState(false);
  const [name, setName] = useState("");
  const [email, setEmail] = useState("");
  const [message, setMessage] = useState("");

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    
    // In a real app, you would send this data to a server
    console.log("Contact form submitted:", { name, email, message });
    
    // Reset form
    setName("");
    setEmail("");
    setMessage("");
    
    // Close dialog and show success message
    setOpen(false);
    toast.success("Ziņa nosūtīta! Mēs ar jums sazināsimies tuvākajā laikā.");
  };

  return (
    <>
      <div className="fixed right-6 bottom-6 z-40">
        <Button
          className="bg-green-600 hover:bg-green-700 h-14 w-14 rounded-full shadow-lg"
          onClick={() => setOpen(true)}
        >
          <MessageSquare className="h-6 w-6" />
          <span className="sr-only">Sazināties</span>
        </Button>
      </div>
      
      <Dialog open={open} onOpenChange={setOpen}>
        <DialogContent className="sm:max-w-md">
          <DialogHeader>
            <DialogTitle>Sazināties ar mums</DialogTitle>
            <DialogDescription>
              Atsūtiet mums ziņu, un mēs ar jums sazināsimies pēc iespējas ātrāk.
            </DialogDescription>
          </DialogHeader>
          
          <form onSubmit={handleSubmit} className="space-y-4">
            <div className="space-y-2">
              <Label htmlFor="name">Vārds</Label>
              <Input 
                id="name" 
                value={name} 
                onChange={(e) => setName(e.target.value)} 
                required 
                placeholder="Jūsu vārds"
              />
            </div>
            
            <div className="space-y-2">
              <Label htmlFor="email">E-pasts</Label>
              <Input 
                id="email" 
                type="email" 
                value={email} 
                onChange={(e) => setEmail(e.target.value)} 
                required 
                placeholder="jusu.epasts@piemers.lv"
              />
            </div>
            
            <div className="space-y-2">
              <Label htmlFor="message">Ziņa</Label>
              <Textarea 
                id="message" 
                value={message} 
                onChange={(e) => setMessage(e.target.value)} 
                required 
                placeholder="Jūsu ziņa..."
                rows={4}
              />
            </div>
            
            <DialogFooter>
              <Button type="button" variant="outline" onClick={() => setOpen(false)}>
                Atcelt
              </Button>
              <Button type="submit" className="gradient-green">
                Nosūtīt
              </Button>
            </DialogFooter>
          </form>
        </DialogContent>
      </Dialog>
    </>
  );
};

export default ContactButton;
